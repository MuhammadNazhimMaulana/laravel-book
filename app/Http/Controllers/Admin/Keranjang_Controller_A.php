<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Pembelian\KeranjangBukuInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StoreKeranjang;

class Keranjang_Controller_A extends Controller
{
    public function __construct(KeranjangBukuInterface_Admin $keranjangBukuInterface_Admin)
    {
        $this->keranjangBukuInterface_Admin = $keranjangBukuInterface_Admin;
    }
     
    public function view_keranjang(int $id)
    {
       return $this->keranjangBukuInterface_Admin->view_keranjang($id);
    }

    public function action(Request $request)
    {
       return $this->keranjangBukuInterface_Admin->action($request);
    }
}
