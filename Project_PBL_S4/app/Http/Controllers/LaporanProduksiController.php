<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibit;

class LaporanProduksiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_bibit' => 'required|string|max:255',
            'bulan_lahir' => 'required|date',
            'jumlah_bibit' => 'required|integer|min:1',
            'harga_bibit' => 'required|numeric|min:0',
        ]);

        // Simpan data ke database
        $bibit = new Bibit();
        $bibit->jenis_bibit = $request->jenis_bibit;
        $bibit->bulan_lahir = $request->bulan_lahir;
        $bibit->jumlah_bibit = $request->jumlah_bibit;
        $bibit->harga_bibit = $request->harga_bibit;
        $bibit->save();

        return redirect()->route('laporan.produksi')->with('success', 'Data berhasil disimpan!');
    }
}
