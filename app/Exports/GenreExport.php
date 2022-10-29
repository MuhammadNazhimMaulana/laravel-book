<?php

namespace App\Exports;

use App\Models\Genre_Model;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings};

class GenreExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Genre',
            'Created At',
            'Updated At' 
        ];
    } 

    public function collection()
    {
        return Genre_Model::all();
    }
}
