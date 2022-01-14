<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\StoreHarga;

interface HargaInterface_Admin
{
    public function get_harga();
    public function tambah_harga();
    public function save_harga(StoreHarga $request);
}