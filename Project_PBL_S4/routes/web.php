<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\HasilLaporanController;


Route::get('/', function () {
    return view('home');
})->name('home');



Route::get('/laporan-produksi', function () {
    return view('laporan_produksi');
})->name('laporan.produksi');

Route::post('/laporan-produksi/store', [LaporanProduksiController::class, 'store'])->name('laporan.produksi.store');
Route::get('/hasil-laporan-produksi', [HasilLaporanController::class, 'index'])->name('hasil.laporan.produksi');


// Route untuk menampilkan form edit
Route::get('/laporan-produksi/edit/{id}', [LaporanProduksiController::class, 'edit'])->name('laporan.produksi.edit');
// Route untuk mengupdate data
Route::put('/laporan-produksi/update/{id}', [LaporanProduksiController::class, 'update'])->name('laporan.produksi.update');
// Route untuk menghapus data
Route::post('/laporan-produksi/delete/{id}', [LaporanProduksiController::class, 'destroy'])->name('laporan.produksi.delete');