<?php

namespace App\Http\Controllers;

use App\Models\JenisIkan;
use Illuminate\Http\Request;

class JenisIkanController extends Controller
{
    // Method untuk menampilkan form tambah ikan
    public function create()
    {
        return view('jenis-ikan.create');
    }

    // Method untuk menyimpan data ikan ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ikan' => 'required|string|max:100',
            'foto_ikan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_ikan' => 'required|string',
        ]);

        // Proses upload foto
        $fotoPath = null;
        if ($request->hasFile('foto_ikan')) {
            $fotoPath = $request->file('foto_ikan')->store('foto_ikan', 'public');
        }

        JenisIkan::create([
            'nama_ikan' => $validated['nama_ikan'],
            'foto_ikan' => $fotoPath,
            'deskripsi_ikan' => $validated['deskripsi_ikan'],
        ]);

        return redirect()->route('jenis-ikan.create')
            ->with('success', 'Jenis ikan berhasil ditambahkan');
    }

    public function index()
    {
        $jenisIkan = JenisIkan::all();
        return view('jenis_ikan.index', compact('jenisIkan'));
    }
}
