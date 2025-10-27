<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kritik;
use App\Models\Warga;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        // ambil range kemarin & hari ini
        $dates = collect([
            Carbon::yesterday()->format('Y-m-d'),
            Carbon::today()->format('Y-m-d'),
        ]);

        $absensi = DB::table('absensis')
            ->join('absensi_warga', 'absensis.id', '=', 'absensi_warga.absensi_id')
            ->join('wargas', 'absensi_warga.warga_id', '=', 'wargas.id')
            ->select(
                'absensis.id as absensi_id',
                'absensis.tgl_absensi',
                'absensis.hari',
                'absensis.keterangan',
                'wargas.id as warga_id',
                'wargas.nama',
                'wargas.blok',
            )
            // ->whereDate('absensis.tgl_absensi', now()->toDateString())
            ->whereDate('absensis.tgl_absensi', '>=', now()->subDay()->toDateString())
            ->whereDate('absensis.tgl_absensi', '<=', now()->toDateString())
            ->orderBy('absensis.tgl_absensi', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->tgl_absensi)->format('Y-m-d');
            });
        // dd(now()->toDateString());
        // dd($absensi);

        // merge dengan tanggal default supaya tetap ada meski kosong
        $rekap = $dates->mapWithKeys(function ($date) use ($absensi) {
            return [$date => $absensi->get($date, collect())];
        });

        // dd($rekap);
        $absensi = $rekap;

        return view('index', compact('absensi'));
    }

    public function create()
    {
        $wargas = Warga::orderBy('blok')->get();
        return view('welcome', compact('wargas'));
    }

    public function createManual()
    {
        $wargas = Warga::orderBy('blok')->get();
        return view('absensi-manual', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'warga_ids'   => 'required|array|min:1',
                'keterangan'  => 'nullable|string',
            ],
            [
                'warga_ids.required' => '🚨 Wajib pilih minimal satu warga untuk absensi ronda',
                'warga_ids.array'    => 'Format data warga tidak valid.',
                'warga_ids.min'      => 'Minimal pilih satu warga untuk absensi.',
                'keterangan.string'  => 'Keterangan harus berupa teks.',
            ]
        );

        // Ambil waktu sekarang di zona Asia/Jakarta
        $now = Carbon::now('Asia/Jakarta');

        // Validasi jam antara 22.00 - 23.00 WIB
        if (! $now->between(
            $now->copy()->setTime(22, 0, 0), // 22:00:00
            $now->copy()->setTime(23, 0, 0) // 23:59:59
        )) {
            return redirect()->back()->withErrors([
                'waktu' => '⏰ PERHATIAN !! Absensi ronda setiap harinya hanya dapat dilakukan antara pukul 22.00 - 23.00 WIB'
            ]);
        }

        $today = now()->toDateString();

        // Cek apakah ada warga yang sudah absen hari ini
        $alreadyAbsent = Absensi::whereDate('tgl_absensi', $today)
            ->whereHas('wargas', function ($q) use ($request) {
                $q->whereIn('warga_id', $request->warga_ids);
            })
            ->with('wargas:id,blok,nama') // opsional untuk ambil nama warga
            ->get();

        if ($alreadyAbsent->isNotEmpty()) {
            $names = $alreadyAbsent
                ->pluck('wargas')
                ->flatten()
                ->map(function ($warga) {
                    return "({$warga->blok}) {$warga->nama}";
                })
                ->unique()
                ->join(', ');
                // ->values()
                // ->all();
            // $names = implode("\n", $names);
            // dd($names);
            
            return redirect()->back()->withErrors([
                'warga_ids' => "🚨 Warga berikut sudah melakukan absensi ronda hari ini :\n {$names}"
                // 'warga_ids' => $names
            ]);
        }

        $absensi = Absensi::create([
            'tgl_absensi' => now(),
            'hari' => now()->format('l'),
            'keterangan' => $request->keterangan,
        ]);

        $absensi->wargas()->attach($request->warga_ids);
        // ✅ redirect ke halaman sukses
        return redirect()->route('absensi.success')->with('success', true);
        // return redirect()->back()->with(
        //     'success',
        //     '✅ Absensi ronda berhasil disimpan.<br><a href="' . route('absensi.index') . '" class="underline">Lihat siapa saja yang sudah absen hari ini</a>'
        // );
    }

    public function success()
    {
        if (!session('success')) {
            return redirect()->route('absensi.index');
        }

        return view('absensi-success');
    }

    public function storeManual(Request $request)
    {
        $request->validate(
            [
                'warga_ids'   => 'required|array|min:1',
                'keterangan'  => 'nullable|string',
            ],
            [
                'warga_ids.required' => '🚨 Wajib mengisi minimal satu warga untuk melakukan absensi ronda',
                'warga_ids.array'    => 'Format data warga tidak valid.',
                'warga_ids.min'      => 'Minimal pilih satu warga untuk absensi.',
                'keterangan.string'  => 'Keterangan harus berupa teks.',
            ]
        );

        // Cek apakah ada warga yang sudah absen di tanggal yang dipilih
        $alreadyAbsent = Absensi::whereDate('tgl_absensi', $request->tgl_absensi)
            ->whereHas('wargas', function ($q) use ($request) {
                $q->whereIn('warga_id', $request->warga_ids);
            })
            ->with('wargas:id,blok,nama') // opsional untuk ambil nama warga
            ->get();

        if ($alreadyAbsent->isNotEmpty()) {
            $names = $alreadyAbsent
                ->pluck('wargas')
                ->flatten()
                ->map(function ($warga) {
                    return "({$warga->blok}) {$warga->nama}";
                })
                ->unique()
                ->join(', ');
            
            return redirect()->back()->withErrors([
                'warga_ids' => "🚨 Warga berikut sudah melakukan absensi ronda di tanggal ini :\n {$names}"
                // 'warga_ids' => $names
            ]);
        }

        $tglAbsensi = Carbon::parse($request->tgl_absensi . ' 22:15:00');
        $absensi = Absensi::create([
            'tgl_absensi' => $tglAbsensi,
            'hari' => $tglAbsensi->format('l'),
            'keterangan' => $request->keterangan,
        ]);

        $absensi->wargas()->attach($request->warga_ids);
        return redirect()->back()->with(
            'success',
            '✅ Absensi ronda berhasil disimpan.<br><a href="' . route('absensi.index') . '" class="underline">Lihat siapa saja yang sudah absen hari ini</a>'
        );
    }

    public function jadwalRonda()
    {
        // Ambil semua warga, lalu group by hari ronda (sunday, monday, dst)
        $wargas = Warga::orderBy('blok')->get()->groupBy('jadwal_ronda');
        return view('jadwal-ronda', compact('wargas'));
    }

    /**
     * Hitung jumlah jadwal ronda dalam 1 bulan
     */
    private function countJadwalInMonth($dayOfWeek, $month, $year)
    {
        $dayOfWeek = strtolower($dayOfWeek); // sunday, monday, etc
        $start = Carbon::create($year, $month, 1);
        $end   = $start->copy()->endOfMonth();

        $count = 0;
        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            if (strtolower($date->format('l')) === $dayOfWeek) {
                $count++;
            }
        }

        return $count;
    }

    public function rekapAbsensi(Request $request)
    {
        $year = $request->year ?? date('Y');

        // Ambil semua warga
        $wargas = Warga::orderBy('blok')->get();

        /** Ambil total kehadiran (H) per warga per bulan dalam 1 query */
        $hadirData = DB::table('absensi_warga')
            ->join('absensis', 'absensi_warga.absensi_id', '=', 'absensis.id')
            ->select(
                'absensi_warga.warga_id',
                DB::raw('MONTH(absensis.tgl_absensi) as bulan'),
                DB::raw('COUNT(*) as total_hadir')
            )
            // ->where('absensi_warga.status', 'hadir')
            ->whereYear('absensis.tgl_absensi', $year)
            ->groupBy('absensi_warga.warga_id', 'bulan')
            ->get()
            ->groupBy('warga_id');

        $rekap = [];

        foreach ($wargas as $warga) {
            $rekapWarga = [
                'blok' => $warga->blok,
                'nama' => $warga->nama,
                'jadwal' => $warga->jadwal_ronda,
                'bulan' => []
            ];

            for ($month = 1; $month <= 12; $month++) {
                // Hitung jumlah jadwal ronda (W)
                $W = $this->countJadwalInMonth($warga->jadwal_ronda, $month, $year);

                // Ambil jumlah hadir (H) dari hasil query agregasi
                $H = $hadirData->has($warga->id)
                    ? $hadirData[$warga->id]->firstWhere('bulan', $month)->total_hadir ?? 0
                    : 0;

                $rekapWarga['bulan'][$month] = [
                    'W' => $W,
                    'H' => $H,
                    'S' => $H - $W, // kekurangan absensi
                ];
            }

            $rekap[] = $rekapWarga;
        }
        // dd($rekap);

        return view('rekap-absensi', compact('rekap', 'year'));
    }

    public function nominasiAbsensi(Request $request)
    {
        $month = $request->month ?? now()->month;
        $year = $request->year ?? now()->year;
        

        // $hadirData = DB::table('absensi_warga')
        //     ->join('absensis', 'absensi_warga.absensi_id', '=', 'absensis.id')
        //     ->join('wargas', 'absensi_warga.warga_id', '=', 'wargas.id')
        //     ->select(
        //         'absensi_warga.warga_id',
        //         'wargas.blok',
        //         'wargas.nama',
        //         'wargas.jadwal_ronda',
        //         DB::raw('MONTH(absensis.tgl_absensi) as bulan'),
        //         DB::raw('COUNT(*) as total_hadir')
        //     )
        //     ->whereMonth('absensis.tgl_absensi', $month)
        //     ->whereYear('absensis.tgl_absensi', $year)
        //     ->groupBy('absensi_warga.warga_id', 'bulan')
        //     ->groupBy('warga_id')
        //     ->orderBy('total_hadir', 'desc')
        //     ->get();

        $hadirData = DB::table('wargas')
            ->leftJoin('absensi_warga', 'absensi_warga.warga_id', '=', 'wargas.id')
            ->leftJoin('absensis', function ($join) use ($month, $year) {
                $join->on('absensis.id', '=', 'absensi_warga.absensi_id')
                    ->whereMonth('absensis.tgl_absensi', $month)
                    ->whereYear('absensis.tgl_absensi', $year);
            })
            ->select(
                'wargas.id as warga_id',
                'wargas.blok',
                'wargas.nama',
                'wargas.jadwal_ronda',
                DB::raw('COUNT(absensis.id) as total_hadir')
            )
            ->whereNotNull('wargas.jadwal_ronda')
            ->groupBy('wargas.id', 'wargas.blok', 'wargas.nama', 'wargas.jadwal_ronda')
            ->orderBy('total_hadir', 'desc')
            ->get();

        // ✅ Tambahkan kolom baru 'total_jadwal' hasil perhitungan custom function
        $hadirData = $hadirData->map(function ($item) use ($month, $year) {
            $item->total_kewajiban = $this->countJadwalInMonth($item->jadwal_ronda, $month, $year);
            $item->selisih = $item->total_hadir - $item->total_kewajiban;
            return $item;
        });

        $top4 = $hadirData
            ->filter(fn($item) => $item->total_kewajiban > 0 && $item->total_hadir > 0)
            ->sortByDesc('total_hadir')
            ->values();
        
        // ✅ Filter: hanya warga yang selisih < 0 (masih kurang hadir)
        // ✅ Urutkan dari selisih terkecil (paling banyak kekurangan)
        $hadirKurang = $hadirData
            ->filter(fn($item) => $item->selisih < 0)
            ->sortBy('selisih')
            ->values(); // reset index

        // dd($hadirData);
        // dd($hadirKurang);
        // dd($top4);

        return view('nominasi-absensi', compact('hadirData', 'hadirKurang', 'top4'));
    }

    public function getByDate($date)
    {
        // Ambil absensi + relasi warga
        $absensis = Absensi::with('wargas')
            ->whereDate('tgl_absensi', $date)
            ->get();

        // Format response JSON
        // $data = $absensis->map(function ($absensi) {
        //     return [
        //         'id' => $absensi->id,
        //         // 'warga' => $absensi->wargas->pluck('nama')->toArray(),
        //         'warga' => $absensi->wargas->map(function ($warga) {
        //             return "({$warga->blok}) {$warga->nama}";
        //         })->toArray(),
        //         'keterangan' => $absensi->keterangan,
        //     ];
        // });

        $data = $absensis->map(function ($absensi) {
            return [
                'id' => $absensi->id,
                'warga' => $absensi->wargas->map(function ($warga) {
                    return [
                        'blok' => $warga->blok,
                        'nama' => $warga->nama,
                    ];
                }),
                'keterangan' => $absensi->keterangan,
            ];
        });

        return response()->json($data);
    }

    public function logAbsensi(Request $request)
    {
        return view('log-absensi');
    }

    public function syaratKetentuan(Request $request)
    {
        return view('syarat-ketentuan');
    }

    public function peraturanKos()
    {
        return view('peraturan-kos');
    }

    public function indexKritikSaran()
    {
        return view('kritik-saran');
    }

    public function storeKritikSaran(Request $request)
    {
        $request->validate(
            [
                'keterangan'  => 'required|string',
            ],
            [
                'keterangan.required'  => 'Isi kritik dan saran tidak boleh kosong, silahkan isi terlebih dahulu di bawah ini.',
            ]
        );
        $absensi = Kritik::create([
            'isi' => $request->keterangan,
            'ip_address' => $request->ip(),
        ]);

        // ✅ redirect ke halaman sukses
        return redirect()->route('kritik-saran.success')->with('success', true);
    }

    public function successKritikSaran()
    {
        // if (!session('success')) {
        //     return redirect()->route('absensi.index');
        // }

        return view('kritik-saran-success');
    }
}