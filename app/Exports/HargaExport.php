<?php

namespace App\Exports;

use App\Models\Harga_Model;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings};

class HargaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Harga',
            'Created At',
            'Updated At' 
        ];
    } 

    public function collection()
    {
        return Harga_Model::all();
    }
}
