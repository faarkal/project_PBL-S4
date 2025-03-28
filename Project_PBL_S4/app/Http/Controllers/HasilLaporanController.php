<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;

class HasilLaporanController extends Controller
{
    public function index()
    {
        $laporanProduksi = DB::table('bibits')->get(); // Mengambil semua data dari tabel bibits

        return view('hasil_laporan_produksi', compact('laporanProduksi'));
    }
}
