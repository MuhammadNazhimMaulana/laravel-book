<?php 

namespace App\Repositories\Admin\Genre;

// Interface
use App\Interfaces\Admin\Genre\GenreInterface_Admin;

// Model
use App\Models\Genre_Model;

// Request
use App\Http\Requests\StoreGenre;

class GenreRepository_Admin implements GenreInterface_Admin
{

    public function get_genre()
    {
        $data = [
            'title' => 'Genre',
            'genres' => Genre_Model::paginate(5)
        ];

        return view('Admin/Genre/view_genre', $data);
    }

    public function tambah_genre()
    {
        $data = [
            'title' => 'Genre'
        ];

        return view('Admin/Genre/create_genre', $data);
    }

    public function save_genre(StoreGenre $request)
    {
        $data_genre = [
            'nama_genre' => $request->input('nama_genre')
        ];

        //Create Data Genre Baru 
        Genre_Model::create($data_genre);

        return redirect('/genre')->with('success', 'Genre Baru Berhasil Ditambahkan');
    }

    public function update_genre(int $id)
    {
        $genre = Genre_Model::where('id_genre', $id)->first();

        $data = [
            'title' => 'Genre',
            'genre' => $genre
        ];

        return view('Admin/Genre/update_genre', $data);        
    }

    public function save_update(StoreGenre $request, int $id)
    {
        $genre = Genre_Model::where('id_genre', $id)->first();

        $data_genre = [
            'nama_genre' => $request->input('nama_genre')
        ];

        //Create Data Genre Baru 
        Genre_Model::where('id_genre', $genre->id_genre)->update($data_genre);

        return redirect('/genre')->with('success-update', 'Genre Baru Berhasil Diubah');        
    }

    public function delete_genre(int $id)
    {
        // Getting specific data
        $genre = Genre_Model::where('id_genre', $id)->first();

        // Delete data from table
        Genre_Model::where('id_genre', $genre->id_genre)->delete();

        return redirect('/genre')->with('danger', 'Genre Baru Berhasil Dihapus');
    }

}

