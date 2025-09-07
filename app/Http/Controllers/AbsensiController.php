<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Warga;

class AbsensiController extends Controller
{
    public function index()
    {
        // $absensi = Absensi::with('wargas')
        //     ->orderBy('tgl_absensi', 'desc')
        //     ->limit(1)
        //     ->get();
            // ->paginate(10); // biar ada pagination
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
            ->orderBy('absensis.tgl_absensi', 'desc')
            ->simplePaginate(20);

        return view('index', compact('absensi'));
    }

    public function create()
    {
        $wargas = Warga::orderBy('blok')->get();
        return view('welcome', compact('wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'warga' => 'required|array|min:1',
            // 'warga.*' => 'string|max:100',
            // 'tgl_absensi' => 'required|date',
            // 'hari' => 'required|string',
            'warga_ids' => 'required|array|min:1',
            'keterangan' => 'nullable|string',
        ]);

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
}