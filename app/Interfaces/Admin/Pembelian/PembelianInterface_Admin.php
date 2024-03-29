<?php

namespace App\Interfaces\Admin\Pembelian;

use App\Http\Requests\StorePembelian;

interface PembelianInterface_Admin
{
    public function get_pembelian();
    public function save_pembelian(StorePembelian $request);
    public function save_update(StorePembelian $request, int $id);
    public function payment(int $id);
    public function delete_pembelian(int $id);
}