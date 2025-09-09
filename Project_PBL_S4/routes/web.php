<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\LaporanProduksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HasilLaporanController;
use App\Http\Controllers\LaporanIndukController;
use App\Http\Controllers\JenisIkanController;
use App\Exports\LaporanIndukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\PemesananController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/laporan-produksi', function () {
    return view('laporan_produksi/laporan_produksi');
})->name('laporan.produksi');

Route::get('/pelaporan', function () {
    return view('pelaporan');
});

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

Route::resource('jenis-ikan', JenisIkanController::class)->except(['show']);
Route::get('/pelaporan', [LaporanController::class, 'gabungan'])->name('pelaporan');

Route::get('/laporan-induk/export/excel', function () {
    return Excel::download(new LaporanIndukExport, 'laporan-induk.xlsx');
})->name('laporan.induk.export.excel');

Route::get('/visi-misi', [VisiMisiController::class, 'index']);

Route::get('/Admin/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('/Admin/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/Admin/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

Route::get('/hasil/penjualan', [PemesananController::class, 'hasilPenjualan'])->name('hasil.penjualan');
Route::put('/pemesanan/{id}/status', [PemesananController::class, 'updateStatus'])->name('pemesanan.update-status');

Route::get('/hasil/laporan/penjualan', [LaporanController::class, 'penjualan'])
     ->name('hasil.laporan.penjualan');