<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $jenisIkan = \App\Models\JenisIkan::all();
        return view('Admin.home', compact('jenisIkan'));
    }
}