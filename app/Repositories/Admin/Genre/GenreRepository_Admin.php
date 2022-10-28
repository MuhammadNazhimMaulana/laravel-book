<?php 

namespace App\Repositories\Admin\Genre;

// Interface
use App\Interfaces\Admin\Genre\GenreInterface_Admin;

// Model
use App\Models\Genre_Model;

// Request
use App\Http\Requests\StoreGenre;

// Excel
use App\Exports\GenreExport;
use Maatwebsite\Excel\Facades\Excel;

class GenreRepository_Admin implements GenreInterface_Admin
{
    const PER_PAGE = 5;

    public function get_genre()
    {
        $data = [
            'title' => 'Genre',
            'genres' => Genre_Model::paginate(self::PER_PAGE)
        ];

        return view('Admin/Genre/view_genre', $data);
    }

    public function get_genre_excel()
    {
        return Excel::download(new GenreExport, 'genres.xlsx');
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
        $genre = Genre_Model::where('id', $id)->first();

        $data = [
            'title' => 'Genre',
            'genre' => $genre
        ];

        return view('Admin/Genre/update_genre', $data);        
    }

    public function save_update(StoreGenre $request, int $id)
    {
        $genre = Genre_Model::where('id', $id)->first();

        $data_genre = [
            'nama_genre' => $request->input('nama_genre')
        ];

        //Create Data Genre Baru 
        Genre_Model::where('id', $genre->id)->update($data_genre);

        return redirect('/genre')->with('success-update', 'Genre Baru Berhasil Diubah');        
    }

    public function delete_genre(int $id)
    {
        // Getting specific data
        $genre = Genre_Model::where('id', $id)->first();

        // Delete data from table
        Genre_Model::where('id', $genre->id)->delete();

        return redirect('/genre')->with('danger', 'Genre Baru Berhasil Dihapus');
    }

}

