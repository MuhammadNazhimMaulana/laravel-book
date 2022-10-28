<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Genre\GenreInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StoreGenre;

class Genre_Controller_A extends Controller
{

    public function __construct(GenreInterface_Admin $genreInterface_Admin)
    {
        $this->genreInterface_Admin = $genreInterface_Admin;
    }

    public function get_genre()
    {
       return $this->genreInterface_Admin->get_genre();
    }

    public function get_genre_excel()
    {
       return $this->genreInterface_Admin->get_genre_excel();
    }

    public function tambah_genre()
    {
        return $this->genreInterface_Admin->tambah_genre();
    }

     public function save_genre(StoreGenre $request)
     {
        return $this->genreInterface_Admin->save_genre($request);
     }

     public function update_genre(int $id)
     {
        return $this->genreInterface_Admin->update_genre($id);
     }

     public function save_update(StoreGenre $request,int $id)
     {
        return $this->genreInterface_Admin->save_update($request, $id);
     }

     public function delete_genre(int $id)
     {
        return $this->genreInterface_Admin->delete_genre($id);
     }
}
