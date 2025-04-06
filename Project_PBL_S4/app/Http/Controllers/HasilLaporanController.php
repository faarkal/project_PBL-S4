<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class HasilLaporanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search'); 
        $message = null; 
        Carbon::setLocale('id');

        $laporanProduksi = DB::table('bibits')
            ->select(
                'id',
                'jenis_bibit',
                'bulan_lahir',
                'jumlah_bibit',
                'harga_bibit',
                DB::raw('jumlah_bibit * harga_bibit as total_harga') 
            )
            ->when($keyword, function ($query, $keyword) {
                return $query->where('jenis_bibit', 'like', '%' . $keyword . '%');
            })
            ->orderBy(DB::raw("STR_TO_DATE(bulan_lahir, '%Y-%m-%d')"), 'asc') 
            ->get()
            ->map(function ($item) {
                $item->bulan_lahir = Carbon::parse($item->bulan_lahir)->translatedFormat('d F Y');
                return $item;
            });

        // Jika hasil pencarian kosong
        if ($keyword && $laporanProduksi->isEmpty()) {
            $message = "Data ikan yang Anda cari tidak tersedia.";
        }

        // Hitung total harga bibit
        $totalHargaBibit = DB::table('bibits')
            ->select(DB::raw('SUM(jumlah_bibit * harga_bibit) as total_harga'))
            ->first()->total_harga;

        return view('hasil_laporan_produksi', compact('laporanProduksi', 'keyword', 'totalHargaBibit', 'message'));
    }

}
