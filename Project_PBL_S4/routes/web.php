<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HasilLaporanController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\LaporanIndukController;

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


// Route untuk menampilkan form edit
Route::get('/laporan-produksi/edit/{id}', [LaporanProduksiController::class, 'edit'])->name('laporan.produksi.edit');
// Route untuk mengupdate data
Route::put('/laporan-produksi/update/{id}', [LaporanProduksiController::class, 'update'])->name('laporan.produksi.update');
// Route untuk menghapus data
Route::post('/laporan-produksi/delete/{id}', [LaporanProduksiController::class, 'destroy'])->name('laporan.produksi.delete');

Route::get('/nota', [NotaController::class, 'index'])->name('nota.index');
Route::post('/nota/upload', [NotaController::class, 'upload'])->name('nota.upload');

Route::get('/laporan-induk', [LaporanIndukController::class, 'index'])->name('hasil.laporan.induk');
Route::get('/laporan-induk/create', [LaporanIndukController::class, 'create'])->name('laporan.induk');
Route::post('/laporan-induk', [LaporanIndukController::class, 'store'])->name('laporan.induk.store');
Route::get('/laporan-induk/{id}/edit', [LaporanIndukController::class, 'edit'])->name('laporan.induk.edit');
Route::put('/laporan-induk/{id}', [LaporanIndukController::class, 'update'])->name('laporan.induk.update');
Route::delete('/laporan-induk/{id}', [LaporanIndukController::class, 'destroy'])->name('laporan.induk.delete');

