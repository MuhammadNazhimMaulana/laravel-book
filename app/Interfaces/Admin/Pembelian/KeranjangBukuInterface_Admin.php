<?php

namespace App\Interfaces\Admin\Pembelian;

use Illuminate\Http\Request;

// Request Sendiri
use App\Http\Requests\StoreKeranjang;

// Model
use App\Models\KeranjangBuku_Model;

interface KeranjangBukuInterface_Admin
{
    public function view_keranjang(int $id);
    public function action(Request $request);
    public function tambah_keranjang(StoreKeranjang $request);
    public function update_keranjang(int $id);
    public function delete_keranjang(KeranjangBuku_Model $keranjang ,int $id, Request $request);
}