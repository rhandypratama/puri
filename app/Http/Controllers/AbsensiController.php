<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Warga;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        // $absensi = Absensi::with('wargas')
        //     ->orderBy('tgl_absensi', 'desc')
        //     ->limit(1)
        //     ->get();
            // ->paginate(10); // biar ada pagination
        // $absensi = DB::table('absensis')
        //     ->join('absensi_warga', 'absensis.id', '=', 'absensi_warga.absensi_id')
        //     ->join('wargas', 'absensi_warga.warga_id', '=', 'wargas.id')
        //     ->select(
        //         'absensis.id as absensi_id',
        //         'absensis.tgl_absensi',
        //         'absensis.hari',
        //         'absensis.keterangan',
        //         'wargas.id as warga_id',
        //         'wargas.nama',
        //         'wargas.blok',
        //     )
        //     ->orderBy('absensis.tgl_absensi', 'desc')
        //     ->simplePaginate(20);

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
            ->whereDate('absensis.tgl_absensi', now()->toDateString())
            ->orderBy('absensis.tgl_absensi', 'desc')
            ->get();

        return view('index', compact('absensi'));
    }

    public function create()
    {
        $wargas = Warga::orderBy('blok')->get();
        return view('welcome', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate(
            // [
            //     // 'warga' => 'required|array|min:1',
            //     // 'warga.*' => 'string|max:100',
            //     // 'tgl_absensi' => 'required|date',
            //     // 'hari' => 'required|string',
            //     'warga_ids' => 'required|array|min:1',
            //     'keterangan' => 'nullable|string',
            // ]
            [
                'warga_ids'   => 'required|array|min:1',
                'keterangan'  => 'nullable|string',
            ],
            [
                'warga_ids.required' => 'Wajib mengisi minimal satu warga untuk absensi.',
                'warga_ids.array'    => 'Format data warga tidak valid.',
                'warga_ids.min'      => 'Minimal pilih satu warga untuk absensi.',
                'keterangan.string'  => 'Keterangan harus berupa teks.',
            ]
        );

        // Ambil waktu sekarang di zona Asia/Jakarta
        $now = Carbon::now('Asia/Jakarta');
        // dd($now->between(
        //     $now->copy()->setTime(22, 0, 0), // 22:00:00
        //     $now->copy()->setTime(23, 0, 0) // 23:59:59
        // ));

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

            return redirect()->back()->withErrors([
                'warga_ids' => "Warga berikut sudah melakukan absensi ronda hari ini :\n {$names}"
            ]);
        }

        $absensi = Absensi::create([
            'tgl_absensi' => now(),
            'hari' => now()->format('l'),
            'keterangan' => $request->keterangan,
        ]);

        $absensi->wargas()->attach($request->warga_ids);
        // return redirect()->back()->with('success', 'Absensi berhasil disimpan.');
        return redirect()->back()->with(
            'success',
            '✅ Absensi berhasil disimpan.<br><a href="' . route('absensi.index') . '" class="underline">Lihat siapa saja yang absen hari ini</a>'
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
}