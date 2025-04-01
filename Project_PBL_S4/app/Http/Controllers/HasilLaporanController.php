<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HasilLaporanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search'); 

        $laporanProduksi = DB::table('bibits')
        ->select(
            'id',
            'jenis_bibit',
            'bulan_lahir',
            'jumlah_bibit',
            'harga_bibit',
            DB::raw('jumlah_bibit * harga_bibit as total_harga') 
        ); 

        if ($keyword) {
            $laporanProduksi->where('jenis_bibit', 'like', '%' . $keyword . '%');
        }

        $laporanProduksi = $laporanProduksi->get()->map(function ($item) {
            $item->bulan_lahir = date('d F Y', strtotime($item->bulan_lahir));
            return $item;
        });

        // Hitung total harga bibit
        $totalHargaBibit = DB::table('bibits')
            ->select(DB::raw('SUM(jumlah_bibit * harga_bibit) as total_harga'))
            ->first()->total_harga;

        return view('hasil_laporan_produksi', compact('laporanProduksi', 'keyword', 'totalHargaBibit'));
    }
}
