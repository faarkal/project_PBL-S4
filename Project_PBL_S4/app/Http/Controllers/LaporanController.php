<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanProduksi;
use App\Models\Pemesanan;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function gabungan(Request $request)
    {
        // Validate request parameters
        $validated = $request->validate([
            'bulan' => 'nullable|string|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'tahun' => 'nullable|digits:4'
        ]);

        // Data Produksi with filters
        $queryProduksi = LaporanProduksi::query();
        
        if ($request->has('bulan')) {
            $queryProduksi->where('bulan_lahir', $validated['bulan']);
        }
        
        if ($request->has('tahun')) {
            $queryProduksi->whereYear('tanggal_laporan', $validated['tahun']);
        }
        
        $laporanProduksi = $queryProduksi->get();

        // Data Penjualan with filters
        $queryPenjualan = Pemesanan::with('jenisIkan')
                           ->where('status', 'selesai');
        
        if ($request->has('bulan')) {
            $queryPenjualan->whereMonth('created_at', $this->convertMonthToNumber($validated['bulan']));
        }
        
        if ($request->has('tahun')) {
            $queryPenjualan->whereYear('created_at', $validated['tahun']);
        }
        
        $pemesanans = $queryPenjualan->get();

        // Return view with data
        return view('pelaporan', [
            'laporanProduksi' => $laporanProduksi,
            'pemesanans' => $pemesanans,
            'totalProduksi' => $laporanProduksi->sum('jumlah_bibit'),
            'totalPenjualan' => $pemesanans->sum(function($item) {
                return $item->jumlah_bibit * $item->harga_satuan;
            }),
            'bulanTerpilih' => $request->bulan ?? null,
            'tahunTerpilih' => $request->tahun ?? Carbon::now()->year
        ]);
    }

    /**
     * Convert month name to number (1-12)
     */
    private function convertMonthToNumber($monthName)
    {
        $months = [
            'Januari' => 1, 'Februari' => 2, 'Maret' => 3, 
            'April' => 4, 'Mei' => 5, 'Juni' => 6,
            'Juli' => 7, 'Agustus' => 8, 'September' => 9,
            'Oktober' => 10, 'November' => 11, 'Desember' => 12
        ];
        
        return $months[$monthName] ?? Carbon::now()->month;
    }
}