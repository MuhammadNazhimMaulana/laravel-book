<?php

namespace App\Interfaces\Admin\Harga;

use App\Http\Requests\StoreHarga;

interface HargaInterface_Admin
{
    public function get_harga();
    public function tambah_harga();
    public function save_harga(StoreHarga $request);
    public function update_harga(int $id);
    public function save_update(StoreHarga $request, int $id);
    public function delete_harga(int $id);
}