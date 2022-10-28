<?php

namespace App\Interfaces\Admin\Penulis;

use App\Http\Requests\StorePenulis;

interface PenulisInterface_Admin
{
    public function get_penulis();
    public function get_penulis_excel();
    public function tambah_penulis();
    public function save_penulis(StorePenulis $request);
    public function update_penulis(int $id);
    public function save_update(StorePenulis $request, int $id);
    public function delete_penulis(int $id);
}