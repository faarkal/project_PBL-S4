<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/visi-misi', [VisiMisiController::class, 'index']);

Route::get('/laporan-produksi', function () {
    return view('laporan_produksi');
})->name('laporan.produksi');

Route::post('/laporan-produksi/store', [LaporanProduksiController::class, 'store'])->name('laporan.produksi.store');

Route::get('/laporan-penjualan', [LaporanController::class, 'penjualan'])->name('laporan.penjualan');
