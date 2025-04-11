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
                'kematian_ikan',
                'harga_bibit',
            )
            ->when($keyword, function ($query, $keyword) {
                return $query->where('jenis_bibit', 'like', '%' . $keyword . '%');
            })
            ->orderBy(DB::raw("STR_TO_DATE(bulan_lahir, '%Y-%m-%d')"), 'asc') 
            ->get()
            ->map(function ($item) {
                $item->bulan_lahir = Carbon::parse($item->bulan_lahir)->translatedFormat('d F Y');
                $item->jumlah_bibit_akhir = $item->jumlah_bibit - ($item->jumlah_bibit * ($item->kematian_ikan / 100)); //jumlah bibit akhir
                $item->total_harga = $item->jumlah_bibit_akhir * $item->harga_bibit; //hitung total harga 
                return $item;
            });

        // Jika hasil pencarian kosong
        if ($keyword && $laporanProduksi->isEmpty()) {
            $message = "Data ikan yang Anda cari tidak tersedia.";
        }

       // Hitung total harga bibit (perubahan disini)
       $totalHargaBibit = $laporanProduksi->sum('total_harga');

        return view('laporan_produksi.hasil_laporan_produksi', compact('laporanProduksi', 'keyword', 'totalHargaBibit', 'message'));
    }

}
