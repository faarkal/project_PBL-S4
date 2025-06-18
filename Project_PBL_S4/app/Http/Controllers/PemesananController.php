<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\JenisIkan;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with('jenisIkan')->orderBy('created_at', 'desc')->get();
        return view('admin.pemesanan', compact('pemesanan'));
    }

    public function create()
    {
        $jenisIkan = JenisIkan::all();
        return view('admin.pemesanan', compact('jenisIkan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'jenis_ikan' => 'required|exists:jenis_ikans,id', // Note: changed to match table name
            'jumlah_bibit' => 'required|integer|min:1',
        ]);

        Pemesanan::create([
            'nama_pembeli' => $validated['nama_pembeli'],
            'no_telepon' => $validated['no_telepon'],
            'jenis_ikan_id' => $validated['jenis_ikan'],
            'jumlah_bibit' => $validated['jumlah_bibit'],
            'status' => 'pending',
        ]);

        return redirect()->route('pemesanan') // Changed to match route name
            ->with('success', 'Pemesanan berhasil ditambahkan');
    }

    public function hasilPemesanan()
    {
        $pemesanans = Pemesanan::with('jenisIkan')
                    ->orderBy('created_at', 'desc')
                    ->get();
        
        return view('Admin.hasil.pemesanan', compact('pemesanans'));
    }
}