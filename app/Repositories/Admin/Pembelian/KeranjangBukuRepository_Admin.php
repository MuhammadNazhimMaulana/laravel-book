<?php 

namespace App\Repositories\Admin\Pembelian;

// Interface
use App\Interfaces\Admin\Pembelian\KeranjangBukuInterface_Admin;

// Model
use App\Models\KeranjangBuku_Model;

// Request
use App\Http\Requests\StoreKeranjang;

class KeranjangBukuRepository_Admin implements KeranjangBukuInterface_Admin
{

    public function view_keranjang(int $id)
    {
        $data = [
            'title' => 'Keranjang Buku',
            'carts' => KeranjangBuku_Model::where('pembelianId', $id)->get()
        ];

        return view('Admin/Keranjang Buku/view_keranjang', $data);
    }

    public function tambah_keranjang(StoreKeranjang $request)
    {

    }
    public function update_keranjang(int $id)
    {

    }
    public function delete_keranjang(int $id)
    {

    }

}

