<?php

namespace App\Interfaces\Admin\Pembelian;

use App\Http\Requests\StoreKeranjang;

interface KeranjangBukuInterface_Admin
{
    public function view_keranjang(int $id);
    public function tambah_keranjang(StoreKeranjang $request);
    public function update_keranjang(int $id);
    public function delete_keranjang(int $id);
}