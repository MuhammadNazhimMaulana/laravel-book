<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Harga\HargaInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StoreHarga;

class Harga_Controller_A extends Controller
{

    public function __construct(HargaInterface_Admin $hargaInterface_Admin)
    {
        $this->hargaInterface_Admin = $hargaInterface_Admin;
    }

    public function get_harga()
    {
       return $this->hargaInterface_Admin->get_harga();
    }

    public function tambah_harga()
    {
        return $this->hargaInterface_Admin->tambah_harga();
    }

     public function save_harga(StoreHarga $request)
     {
        return $this->hargaInterface_Admin->save_harga($request);
     }

     public function update_harga(int $id)
     {
        return $this->hargaInterface_Admin->update_harga($id);
     }

     public function save_update(StoreHarga $request,int $id)
     {
        return $this->hargaInterface_Admin->save_update($request, $id);
     }

     public function delete_harga(int $id)
     {
        return $this->hargaInterface_Admin->delete_harga($id);
     }
}
