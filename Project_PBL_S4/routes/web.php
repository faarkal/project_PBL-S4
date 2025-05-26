<?php

use App\Http\Controllers\HasilPenjualanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanProduksiController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/hasil-penjualan', [HasilPenjualanController::class, 'index'])->name('hasil-penjualan');
Route::post('/hasil-penjualan/simpan', [HasilPenjualanController::class, 'simpan'])->name('simpan-pemesanan');

Route::get('/laporan-produksi', function () {
    return view('laporan_produksi');
})->name('laporan.produksi');


Route::get('/laporan-penjualan', function () {
    return view('laporan_penjualan');
})->name('laporan.penjualan');

Route::get('/laporan-induk', function () {
    return view('laporan_induk');
})->name('laporan.induk');

Route::post('/laporan-produksi/store', [LaporanProduksiController::class, 'store'])->name('laporan.produksi.store');


Route::get('/hasil', [HasilPenjualanController::class, 'index'])->name('hasil.index');
Route::post('/hasil', [HasilPenjualanController::class, 'store'])->name('hasil.store');
Route::put('/hasil/{id}', [HasilPenjualanController::class, 'update'])->name('hasil.update');
Route::delete('/hasil/{id}', [HasilPenjualanController::class, 'destroy'])->name('hasil.destroy');

Route::get('/jenis-ikan/create', [JenisIkanController::class, 'create'])->name('jenis-ikan.create');
Route::post('/jenis-ikan', [JenisIkanController::class, 'store'])->name('jenis-ikan.store');
