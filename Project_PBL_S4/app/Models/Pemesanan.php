<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans'; // Explicit table name
    protected $fillable = ['nama_pembeli', 'no_telepon', 'jenis_ikan_id', 'jumlah_bibit', 'status'];

    public function jenisIkan()
    {
        return $this->belongsTo(JenisIkan::class, 'jenis_ikan_id');
    }
}