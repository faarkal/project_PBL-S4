<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanInduk;

class LaporanIndukController extends Controller
{
    public function index(Request $request)
    {
        $query = LaporanInduk::query();

        if ($request->has('search')) {
            $query->where('nama_induk', 'like', '%' . $request->search . '%');
        }

        $laporanInduk = $query->get();

        return view('hasil_laporan_induk', compact('laporanInduk'));
    }

    public function create()
    {
        return view('laporan_induk');
    }

    public function store(Request $request)
    {
        LaporanInduk::create($request->all());

        return redirect()->route('hasil.laporan.induk')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $laporanInduk = LaporanInduk::findOrFail($id);
    return view('edit_laporan_induk', compact('laporanInduk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_induk' => 'required',
            'jenis_kelamin' => 'required',
            'asal_induk' => 'required',
            'jumlah' => 'required|integer',
            'tanggal_masuk' => 'required|date',
        ]);

        $laporanInduk = LaporanInduk::findOrFail($id);
        $laporanInduk->update($request->all());

        return redirect()->route('hasil.laporan.induk')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $laporanInduk = LaporanInduk::findOrFail($id);
        $laporanInduk->delete();

        return redirect()->route('hasil.laporan.induk')->with('success', 'Data berhasil dihapus!');
    }
}
