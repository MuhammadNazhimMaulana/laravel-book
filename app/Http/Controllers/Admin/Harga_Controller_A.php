<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Modelnya
use App\Models\Harga_Model;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StoreHarga;

class Harga_Controller_A extends Controller
{
    public function get_harga()
    {
        $data = [
            'title' => 'Harga',
            'prizes' => Harga_Model::paginate(5)
        ];

        return view('Admin/Harga/view_harga', $data);
    }

    public function tambah_harga()
    {
        $data = [
            'title' => 'Harga'
        ];

        return view('Admin/Harga/create_harga', $data);
    }

    public function save_harga(StoreHarga $request)
    {
        $data_harga = [
            'harga_satuan' => $request->input('harga_satuan')
        ];

        // Create Data Harga Baru 
        Harga_Model::create($data_harga);

        return redirect('/harga')->with('success', 'Harga Baru Berhasil Ditambahkan');
    }
}
