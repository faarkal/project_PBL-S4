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
        $request->validate([
            'nama_ikan' => 'required|string|max:255|unique:jenis_ikans'
        ]);
    
        JenisIkan::create([
            'nama_ikan' => $request->nama_ikan
        ]);
    
        return redirect()->route('home')->with('success', 'Jenis ikan berhasil ditambahkan');
    }
}
