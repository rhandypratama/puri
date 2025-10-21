<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi', [AbsensiController::class, 'create'])->name('absensi.create');
Route::get('/absensi-manual', [AbsensiController::class, 'createManual'])->name('absensi.create.manual');
Route::get('/absensi/success', [AbsensiController::class, 'success'])->name('absensi.success');
Route::get('/jadwal-ronda', [AbsensiController::class, 'jadwalRonda'])->name('absensi.jadwal-ronda');
Route::get('/rekap-absensi', [AbsensiController::class, 'rekapAbsensi'])->name('absensi.rekap-absensi');
Route::get('/nominasi-absensi', [AbsensiController::class, 'nominasiAbsensi'])->name('absensi.nominasi-absensi');
Route::get('/log-absensi', [AbsensiController::class, 'logAbsensi'])->name('absensi.log');
Route::get('/absensi/by-date/{date}', [AbsensiController::class, 'getByDate']);
Route::get('/syarat-ketentuan', [AbsensiController::class, 'syaratKetentuan'])->name('syarat-ketentuan');
Route::get('/peraturan-kos', [AbsensiController::class, 'peraturanKos'])->name('peraturan-kos');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
Route::post('/absensi-manual', [AbsensiController::class, 'storeManual'])->name('absensi.store.manual');
