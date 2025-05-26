<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilPenjualanController extends Controller
{
    public function index()
    {
        // Menampilkan halaman hasil penjualan
        return view('hasil_penjualan');
    }

    public function simpan(Request $request)
    {
        // Contoh simpan data ke database (jika ada model)
        // $pemesanan = new Pemesanan();
        // $pemesanan->nama = $request->input('namaPemesan');
        // $pemesanan->nomor = $request->input('nomorPemesanan');
        // $pemesanan->jenis_ikan = $request->input('jenisIkan');
        // $pemesanan->save();

        return redirect()->route('hasil-penjualan')->with('success', 'Pemesanan berhasil disimpan.');
    }
}
