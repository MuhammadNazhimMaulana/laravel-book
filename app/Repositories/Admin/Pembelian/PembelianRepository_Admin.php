<?php 

namespace App\Repositories\Admin\Pembelian;

// Interface
use App\Interfaces\Admin\Pembelian\PembelianInterface_Admin;

// Model
use App\Models\Pembelian_Model;

// Request
use App\Http\Requests\StorePembelian;

class PembelianRepository_Admin implements PembelianInterface_Admin
{

    public function get_pembelian()
    {
        $data = [
            'title' => 'Pembelian',
            'buyers' => Pembelian_Model::paginate(5)
        ];

        return view('Admin/Pembelian/view_pembelian', $data);
    }

    public function save_pembelian(StorePembelian $request)
    {
        $data_pembelian = [
            'userId' => $request->input('userId')
        ];

        //Create Data Pembelian Baru 
        Pembelian_Model::create($data_pembelian);

        return redirect('/pembelian')->with('success', 'Pembelian Baru Berhasil Ditambahkan');
    }

    public function update_pembelian(int $id)
    {
        $pembelian = Pembelian_Model::where('id', $id)->first();

        $data = [
            'title' => 'Pembelian',
            'pembelian' => $pembelian
        ];

        return view('Admin/Pembelian/update_pembelian', $data);        
    }

    public function save_update(StorePembelian $request, int $id)
    {
        $pembelian = Pembelian_Model::where('id', $id)->first();

        $data_pembelian = [
            'userId' => $request->input('userId'),
            'jumlah_beli' => $request->input('jumlah_beli'),
            'total_harga' => $request->input('total_harga')
        ];

        //Update Data Pembelian Baru 
        Pembelian_Model::where('id', $pembelian->id)->update($data_pembelian);

        return redirect('/pembelian')->with('success-update', 'Pembelian Baru Berhasil Diubah');        
    }

    public function delete_pembelian(int $id)
    {
        // Getting specific data
        $pembelian = Pembelian_Model::where('id', $id)->first();

        // Delete data from table
        Pembelian_Model::where('id', $pembelian->id)->delete();

        return redirect('/pembelian')->with('danger', 'Pembelian Baru Berhasil Dihapus');
    }

}

