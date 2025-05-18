<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HasilLaporanController;
use App\Http\Controllers\LaporanIndukController;
use App\Http\Controllers\JenisIkanController;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/visi-misi', [VisiMisiController::class, 'index']);

Route::get('/laporan-produksi', function () {
    return view('laporan_produksi');
})->name('laporan.produksi');

Route::post('/laporan-produksi/store', [LaporanProduksiController::class, 'store'])->name('laporan.produksi.store');


Route::get('/laporan-penjualan', [LaporanController::class, 'penjualan'])->name('laporan.penjualan');

Route::get('/hasil-laporan-produksi', [HasilLaporanController::class, 'index'])->name('hasil.laporan.produksi');


Route::get('/laporan-produksi/edit/{id}', [LaporanProduksiController::class, 'edit'])->name('laporan.produksi.edit');
Route::put('/laporan-produksi/update/{id}', [LaporanProduksiController::class, 'update'])->name('laporan.produksi.update');
Route::post('/laporan-produksi/delete/{id}', [LaporanProduksiController::class, 'destroy'])->name('laporan.produksi.delete');


Route::get('/laporan-induk', [LaporanIndukController::class, 'index'])->name('hasil.laporan.induk');
Route::get('/laporan-induk/create', [LaporanIndukController::class, 'create'])->name('laporan.induk');
Route::post('/laporan-induk', [LaporanIndukController::class, 'store'])->name('laporan.induk.store');
Route::get('/laporan-induk/{id}/edit', [LaporanIndukController::class, 'edit'])->name('laporan.induk.edit');
Route::put('/laporan-induk/{id}', [LaporanIndukController::class, 'update'])->name('laporan.induk.update');
Route::delete('/laporan-induk/{id}', [LaporanIndukController::class, 'destroy'])->name('laporan.induk.delete');

Route::get('/laporan-produksi/create', [LaporanProduksiController::class, 'create'])->name('laporan.produksi.create');
Route::post('/laporan-produksi/store', [LaporanProduksiController::class, 'store'])->name('laporan.produksi.store');

Route::get('/jenis-ikan/create', [JenisIkanController::class, 'create'])->name('jenis-ikan.create');
Route::post('/jenis-ikan', [JenisIkanController::class, 'store'])->name('jenis-ikan.store');
