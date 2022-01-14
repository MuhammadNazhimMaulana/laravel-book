<?php 

namespace App\Repositories\Admin;

// Interface
use App\Interfaces\Admin\HargaInterface_Admin;

// Model
use App\Models\Harga_Model;

// Request
use App\Http\Requests\StoreHarga;

class HargaRepository_Admin implements HargaInterface_Admin
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

        //Create Data Harga Baru 
        Harga_Model::create($data_harga);

        return redirect('/harga')->with('success', 'Harga Baru Berhasil Ditambahkan');
    }

}

?>