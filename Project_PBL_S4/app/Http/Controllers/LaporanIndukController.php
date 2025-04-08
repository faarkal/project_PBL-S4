<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanInduk;

class LaporanIndukController extends Controller
{
    public function create()
    {
        return view('laporan.induk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_induk' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'asal_induk' => 'required|string',
        ]);

        LaporanInduk::create($request->all());

        return redirect()->route('hasil.laporan.induk')->with('success', 'Laporan induk berhasil disimpan.');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $laporanInduk = LaporanInduk::when($search, function ($query, $search) {
            return $query->where('nama_induk', 'like', "%$search%");
        })->get();

        return view('hasil_laporan_induk', compact('laporanInduk'));
    }
}
