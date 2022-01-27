<?php 

namespace App\Repositories\Admin\Pembelian;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Total keranjang
        $totals = KeranjangBuku_Model::select(DB::raw('SUM(harga_buku) AS total_harga'), DB::raw('COUNT(bukuId) AS buku'))->where('pembelianId', $id)->first();

        $data = [
            'title' => 'Keranjang Buku',
            'carts' => KeranjangBuku_Model::where('pembelianId', $id)->get(),
            'books' => Buku_Model::all(),
            'totals' => $totals,
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
        
        $models = KeranjangBuku_Model::where('pembelianId', $request->input('pembelianId'))->get();

       
        $data_keranjang = [
            'pembelianId' => $request->input('pembelianId'),
            'bukuId' => $request->input('bukuId'),
            'harga_buku' => $request->input('harga_buku'),
        ];

        // Cek jikalau ada nama Buku yang double di keranjang
        foreach($models as $model){

            if($model->bukuId == $request->input('bukuId'))
            {
                return redirect('/keranjang-buku/' . $request->input('pembelianId'))->with('tambah-double', 'Buku ini sudah ada di keranjang');
            }

        }
        
        // Kalau tidak double akan di masukkan ke keranjang
        KeranjangBuku_Model::create($data_keranjang);

        return redirect('/keranjang-buku/' . $request->input('pembelianId'))->with('success-tambah', 'Buku Berhasil Ditambahkan dalam Keranjang');
    }

    public function update_keranjang(int $id)
    {

    }

    public function delete_keranjang(KeranjangBuku_Model $keranjang, int $id, Request $request)
    {
        // Delete data from table
        $keranjang->where('id', $id)->delete();

        return redirect('/keranjang-buku/' . $request->input('pembelianId'))->with('danger', 'Data Keranjang Berhasil Dihapus');
    }

}

