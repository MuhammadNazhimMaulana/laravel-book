<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Pembelian\PembelianInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StorePenulis;

class Pembelian_Controller_A extends Controller
{
    public function __construct(PembelianInterface_Admin $pembelianInterface_Admin)
    {
        $this->pembelianInterface_Admin = $pembelianInterface_Admin;
    }
     
    public function get_pembelian()
    {
       return $this->pembelianInterface_Admin->get_pembelian();
    }

     public function save_pembelian(StorePenulis $request)
     {
        return $this->pembelianInterface_Admin->save_pembelian($request);
     }

     public function update_pembelian(int $id)
     {
        return $this->pembelianInterface_Admin->update_pembelian($id);
     }

     public function save_update(StorePenulis $request,int $id)
     {
        return $this->pembelianInterface_Admin->save_update($request, $id);
     }

     public function delete_pembelian(int $id)
     {
        return $this->pembelianInterface_Admin->delete_pembelian($id);
     }
}
