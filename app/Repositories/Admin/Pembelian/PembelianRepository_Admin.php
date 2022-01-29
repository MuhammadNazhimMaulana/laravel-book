<?php 

namespace App\Repositories\Admin\Pembelian;

// Interface
use App\Interfaces\Admin\Pembelian\PembelianInterface_Admin;

// Model
use App\Models\Pembelian_Model;

// Request
use App\Http\Requests\StorePembelian;
use Illuminate\Support\Facades\Log;

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
        // Getting name of cashier
        $kasir = $request->session()->get('pengguna');

        $data_pembelian = [
            'userId' => $kasir[2]
        ];

        //Create Data Pembelian Baru 
        $pembelian = Pembelian_Model::create($data_pembelian);

        // Getting id pembelian obat
        $id = $pembelian->id;

        return redirect('/keranjang-buku/' .$id)->with('success', 'Keranjang Baru Berhasil Dibuat');
    }

    public function save_update(StorePembelian $request, int $id)
    {
        $pembelian = Pembelian_Model::where('id', $id)->first();

        $data_pembelian = [
            'userId' => $pembelian->userId,
            'jumlah_beli' => $request->input('jumlah_beli'),
            'total_harga' => $request->input('total_harga')
        ];

        //Update Data Pembelian Baru 
        $pembelian->update($data_pembelian);

        return redirect('/pembelian/payment/'. $pembelian->id)->with('success-update', 'Pembelian Baru Berhasil Diubah');        
    }

    public function payment(int $id)
    {
        $data = [
            'title' => 'Pembelian',
            'pembelian' => Pembelian_Model::where('id', $id)
        ];

        return view('Admin/Pembelian/payment_pembelian', $data);
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

