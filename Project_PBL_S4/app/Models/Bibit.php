<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory; 

    protected $table = 'bibits'; 

    protected $fillable = [
        'jenis_bibit',
        'bulan_lahir',
        'jumlah_bibit',
        'kematian_ikan',
        'harga_bibit',
    ];

    public $timestamps = true; 

    // app/Models/Bibit.php
    public function jenisIkan()
    {
        return $this->belongsTo(JenisIkan::class, 'jenis_bibit', 'id');
    }
}
