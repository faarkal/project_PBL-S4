<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory; // Menyertakan trait HasFactory

    protected $table = 'bibits'; // Nama tabel

    protected $fillable = [
        'jenis_bibit',
        'bulan_lahir',
        'jumlah_bibit',
        'kematian_ikan',
        'harga_bibit',
    ]; // Kolom yang dapat diisi secara massal

    public $timestamps = true; // Mengaktifkan timestamps
}
