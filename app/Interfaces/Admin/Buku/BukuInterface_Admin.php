<?php

namespace App\Interfaces\Admin\Buku;

use App\Http\Requests\StoreBuku;

interface BukuInterface_Admin
{
    public function get_buku();
    public function tambah_buku();
    public function save_buku(StoreBuku $request);
    public function update_buku(int $id);
    public function save_update(StoreBuku $request, int $id);
    public function delete_buku(int $id);
}