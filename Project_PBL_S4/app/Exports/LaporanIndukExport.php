<?php

namespace App\Exports;

use App\Models\LaporanInduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanIndukExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return LaporanInduk::select('nama_induk', 'jenis_kelamin', 'asal_induk', 'jumlah', 'tanggal_masuk')->get();
    }

    public function headings(): array
    {
        return [
            'Nama Induk',
            'Jenis Kelamin',
            'Asal Induk',
            'Jumlah',
            'Tanggal Masuk',
        ];
    }
}
