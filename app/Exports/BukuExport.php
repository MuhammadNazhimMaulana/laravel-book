<?php

namespace App\Exports;

use App\Models\Buku_Model;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings};

class BukuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Judul Buku',
            'Jumlah Halaman',
            'Tanggal Publikasi',
            'Created At',
            'Updated At' 
        ];
    } 

    public function collection()
    {
        return Buku_Model::select('id', 'judul_buku', 'jumlah_halaman', 'tanggal_publikasi', 'created_at', 'updated_at')->get();
    }
}
