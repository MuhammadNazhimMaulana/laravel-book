<?php

namespace App\Interfaces\Admin\Genre;

use App\Http\Requests\StoreGenre;

interface GenreInterface_Admin
{
    public function get_genre();
    public function tambah_genre();
    public function save_genre(StoreGenre $request);
    public function update_genre(int $id);
    public function save_update(StoreGenre $request, int $id);
    public function delete_genre(int $id);
}