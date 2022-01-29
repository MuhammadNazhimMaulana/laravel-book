<?php

namespace App\Observers;

use App\Models\{Pembelian_Model, Buku_Model, KeranjangBuku_Model};
use Illuminate\Support\Facades\Log;

class PembelianObserver
{
    /**
     * Handle the Pembelian_Model "updating" event.
     *
     * @param  \App\Models\Pembelian_Model  $pembelian_Model
     * @return void
     */
    
    public function updating(Pembelian_Model $pembelian_Model)
    {
        $keranjangBuku_Model = new KeranjangBuku_Model;
        $buku_Model = new Buku_Model;

        $carts = $keranjangBuku_Model->where('pembelianId', $pembelian_Model->id)->get();

        // Mengurangi Jumlah Stok Buku
        foreach($carts as $cart)
        {
            $stok_buku = $buku_Model->where('id', $cart->bukuId)->first();

            $data_buku = [
                'stok_buku' => $stok_buku->stok_buku - 1
            ];

            $buku_Model->where('id', $cart->bukuId)->update($data_buku);
        }
    }
}
