<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bibit;
use App\Models\Laporan;
use App\Models\JenisIkan;

class LaporanProduksiController extends Controller
{
    public function store(Request $request)
    {
    // Validasi input
    $request->validate([
        'jenis_bibit' => 'required',
        'bulan_lahir' => 'required|date',
        'jumlah_bibit' => 'required|integer|min:0',
        'ukuran_ikan' => 'required|integer|min:1',
        'restocking' => 'required|integer|min:0', 
        'kematian_ikan' => 'required|numeric|min:0|max:100',
        'harga_bibit' => 'required|numeric|min:0',
    ]);

    Bibit::create($request->all());

    // Tambahkan pesan flash
    session()->flash('success', 'Data berhasil disimpan!');

    return redirect()->route('hasil.laporan.produksi');
    }


    public function edit($id)
    {
        $bibit = DB::table('bibits')->where('id', $id)->first(); 
        return view('laporan_produksi.edit', compact('bibit')); 
    }

    public function update(Request $request, $id)
    {
    // Validasi input
    $request->validate([
        'jenis_bibit' => 'required|string|max:255',
        'bulan_lahir' => 'required|date',
        'jumlah_bibit' => 'required|integer|min:1',
        'ukuran_ikan' => 'required|integer|min:1',
        'restocking' => 'required|integer|min:0', 
        'kematian_ikan' => 'required|numeric|min:0|max:100', 
        'harga_bibit' => 'required|numeric|min:0',
    ]);

    // Update data di database
    DB::table('bibits')->where('id', $id)->update([
        'jenis_bibit' => $request->input('jenis_bibit'),
        'bulan_lahir' => $request->input('bulan_lahir'),
        'jumlah_bibit' => $request->input('jumlah_bibit'),
        'ukuran_ikan' => $request->input('ukuran_ikan'),
        'restocking' => $request->input('restocking'), 
        'kematian_ikan' => $request->input('kematian_ikan'), 
        'harga_bibit' => $request->input('harga_bibit'),
        'updated_at' => now(),
    ]);

    session()->flash('success', 'Data berhasil diperbarui!');

    return redirect()->route('hasil.laporan.produksi', $id);
    }



    public function destroy($id)
    {
        // Hapus data dari database
        DB::table('bibits')->where('id', $id)->delete();

        session()->flash('success', 'Data berhasil dihapus!');
        return redirect()->route('hasil.laporan.produksi');
    }
    
    public function create()
    {
        $jenisikans = JenisIkan::all();
        return view('laporan.produksi.create', compact('jenisikans'));
    }

    public function pelaporan(Request $request)
{
    $selectedMonth = $request->input('month', date('m'));
    $selectedYear = $request->input('year', date('Y'));
    
    $laporanProduksi = DB::table('bibits')
        ->whereMonth('bulan_lahir', $selectedMonth)
        ->whereYear('bulan_lahir', $selectedYear)
        ->get()
        ->map(function ($item) {
            // Calculate derived values
            $item->jumlah_bibit_akhir = $item->jumlah_bibit - ($item->jumlah_bibit * ($item->kematian_ikan / 100));
            $item->total_harga = $item->jumlah_bibit_akhir * $item->harga_bibit;
            return $item;
        });
    
    return view('pelaporan', [
        'laporanProduksi' => $laporanProduksi,
        'selectedMonth' => $selectedMonth,
        'selectedYear' => $selectedYear
    ]);
}

}
