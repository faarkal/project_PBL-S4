<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanIkan extends Model
{
    //

    protected $table = 'penjualan_ikan';

    protected $fillable = [
        'jenis_ikan',
        'stok',
        'angka_kehidupan',
        'angka_kematian',
        'ukuran',
        'total',
    ];
}
