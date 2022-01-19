<?php 

namespace App\Repositories\Admin\Harga;

// Interface
use App\Interfaces\Admin\Harga\HargaInterface_Admin;

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

    public function update_harga(int $id)
    {
        $harga = Harga_Model::where('id', $id)->first();

        $data = [
            'title' => 'Harga',
            'harga' => $harga
        ];

        return view('Admin/Harga/update_harga', $data);        
    }

    public function save_update(StoreHarga $request, int $id)
    {
        $harga = Harga_Model::where('id', $id)->first();

        $data_harga = [
            'harga_satuan' => $request->input('harga_satuan')
        ];

        //Create Data Harga Baru 
        Harga_Model::where('id', $harga->id)->update($data_harga);

        return redirect('/harga')->with('success-update', 'Harga Baru Berhasil Diubah');        
    }

    public function delete_harga(int $id)
    {
        // Getting specific data
        $harga = Harga_Model::where('id', $id)->first();

        // Delete data from table
        Harga_Model::where('id', $harga->id)->delete();

        return redirect('/harga')->with('danger', 'Harga Baru Berhasil Dihapus');
    }

}

