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

    public function __construct()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');

        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;

        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;   
    }

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
        $transaksi = Pembelian_Model::where('id', $id)->first();

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transaksi->total_harga,
            ),
            'customer_details' => array(
                'first_name' => $transaksi->user->first_name,
                'last_name' => $transaksi->user->last_name,
                'email' => $transaksi->user->email,
                'phone' => $transaksi->user->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            'title' => 'Pembelian',
            'pembelian' => $transaksi,
            "snapToken" => $snapToken,
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

