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