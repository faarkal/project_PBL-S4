<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanInduk extends Model
{
    protected $table = 'laporan_induks';

    protected $fillable = [
        'nama_induk',
        'jenis_kelamin',
        'asal_induk',
        'jumlah',
        'tanggal_masuk',
    ];
}
