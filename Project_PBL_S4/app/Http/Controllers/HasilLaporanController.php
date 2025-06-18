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
            'ukuran_ikan',
            'restocking', 
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
            $total_bibit = $item->jumlah_bibit - $item->restocking; 
            $item->jumlah_bibit_akhir = $total_bibit - ($total_bibit * ($item->kematian_ikan / 100));
            $item->total_harga = $item->jumlah_bibit_akhir * $item->harga_bibit;
            return $item;
        });

        // Jika hasil pencarian kosong
        if ($keyword && $laporanProduksi->isEmpty()) {
            $message = "Data ikan yang Anda cari tidak tersedia.";
        }

       $totalHargaBibit = $laporanProduksi->sum('total_harga');

        return view('laporan_produksi.hasil_laporan_produksi', compact('laporanProduksi', 'keyword', 'totalHargaBibit', 'message'));
    }

    public function clientIndex()
    {
        $laporans = LaporanProduksi::where('status', 'published')->get(); // Hanya tampilkan yang published
        return view('client.hasil_laporan_produksi', compact('laporans'));
    }

}
