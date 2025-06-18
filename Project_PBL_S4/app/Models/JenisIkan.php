<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIkan extends Model
{
    use HasFactory;
    protected $table = 'jenis_ikans';
    protected $fillable = ['nama_ikan']; 

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}