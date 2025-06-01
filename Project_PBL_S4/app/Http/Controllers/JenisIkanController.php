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
            'nama_ikan' => 'required|string|max:100',
        ]);
    
        JenisIkan::create($request->all());

        return redirect()->route('jenis-ikan.create')
            ->with('success', 'Jenis ikan berhasil ditambahkan');
    }

    public function index()
    {
        $jenisIkan = JenisIkan::all();
        return view('jenis_ikan.index', compact('jenisIkan'));
    }
}
