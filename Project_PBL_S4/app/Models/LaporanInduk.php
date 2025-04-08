<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanInduk extends Model
{
    use HasFactory;

    protected $table = 'laporan_induks';

    protected $fillable = [
        'nama_induk',
        'jenis_kelamin',
        'jumlah',
        'asal_induk',
    ];
}
