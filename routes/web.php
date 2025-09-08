<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi', [AbsensiController::class, 'create'])->name('absensi.create');
Route::get('/jadwal-ronda', [AbsensiController::class, 'jadwalRonda'])->name('absensi.jadwal-ronda');
Route::get('/rekap-absensi', [AbsensiController::class, 'rekapAbsensi'])->name('absensi.rekap-absensi');
Route::get('/log-absensi', [AbsensiController::class, 'logAbsensi'])->name('absensi.log');
Route::get('/absensi/by-date/{date}', [AbsensiController::class, 'getByDate']);
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
