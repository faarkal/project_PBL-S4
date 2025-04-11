<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotaController extends Controller
{
    public function index()
    {
        return view('nota_pembayaran');
    }

    public function upload(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:5240', // Hanya menerima PDF, JPG, JPEG, PNG
        ]);

        // Simpan file ke folder "uploads/nota"
        $path = $request->file('file')->store('uploads/nota', 'public');

        return back()->with('success', 'File berhasil diupload!')->with('file', $path);
    }
}
