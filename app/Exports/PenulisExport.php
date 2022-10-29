<?php

namespace App\Exports;

use App\Models\Penulis_Model;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings};

class PenulisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Nama Penulis',
            'Umur Penulis',
            'Created At',
            'Updated At' 
        ];
    } 

    public function collection()
    {
        return Penulis_Model::all();
    }
}
