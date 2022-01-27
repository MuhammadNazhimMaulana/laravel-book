<?php 

namespace App\Repositories\Admin\Pembelian;

use Illuminate\Http\Request;

// Interface
use App\Interfaces\Admin\Pembelian\KeranjangBukuInterface_Admin;

// Model
use App\Models\{KeranjangBuku_Model, Pembelian_Model, Buku_Model, Harga_Model};

// Request
use App\Http\Requests\StoreKeranjang;

class KeranjangBukuRepository_Admin implements KeranjangBukuInterface_Admin
{

    public function view_keranjang(int $id)
    {
        $data = [
            'title' => 'Keranjang Buku',
            'carts' => KeranjangBuku_Model::where('pembelianId', $id)->get(),
            'books' => Buku_Model::all(),
            'pembelian' => Pembelian_Model::where('id', $id)->first()
        ];

        return view('Admin/Keranjang Buku/view_keranjang', $data);
    }

    public function action(Request $request)
    {

        if ($request->input('action')) {
            $action = $request->input('action');

            if ($action == 'get_cost') {

                $buku = Buku_Model::where('id', $request->input('bukuId'))->first();

                $data = Harga_Model::where('id', $buku->hargaId)->first();

                return response($data);
            }
        }
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

