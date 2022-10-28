<?php 

namespace App\Repositories\Admin\Buku;

use Illuminate\Support\Facades\Storage;
// Interface
use App\Interfaces\Admin\Buku\BukuInterface_Admin;

// Model
use App\Models\{Buku_Model, Penulis_Model, Harga_Model, Genre_Model};

// Request
use App\Http\Requests\StoreBuku;

class BukuRepository_Admin implements BukuInterface_Admin
{
    const PER_PAGE = 5;

    public function get_buku()
    {
        $data = [
            'title' => 'Buku',
            'books' => Buku_Model::paginate(self::PER_PAGE)
        ];

        return view('Admin/Buku/view_buku', $data);
    }

    public function tambah_buku()
    {
        $data = [
            'title' => 'Buku',
            'writers' => Penulis_Model::all(),
            'genres' => Genre_Model::all(),
            'prizes' => Harga_Model::all()
        ];

        return view('Admin/Buku/create_buku', $data);
    }

    public function save_buku(StoreBuku $request)
    {
        $data_buku = [
            'hargaId' => $request->input('hargaId'),
            'genreId' => $request->input('genreId'),
            'penulisId' => $request->input('penulisId'),
            'judul_buku' => $request->input('judul_buku'),
            'stok_buku' => $request->input('stok_buku'),
            'jumlah_halaman' => $request->input('jumlah_halaman'),
            'tanggal_publikasi' => $request->input('tanggal_publikasi'),
            'foto_buku' => $request->file('foto_buku')
        ];

        if ($request->file('foto_buku')) {
            $data_buku['foto_buku'] = $request->file('foto_buku')->store('Foto Buku');
        }

        //Create Data Buku Baru 
        Buku_Model::create($data_buku);

        return redirect('/buku')->with('success', 'Buku Baru Berhasil Ditambahkan');
    }

    public function update_buku(int $id)
    {
        $buku = Buku_Model::where('id', $id)->first();

        $data = [
            'title' => 'Buku',
            'book' => $buku,
            'writers' => Penulis_Model::all(),
            'genres' => Genre_Model::all(),
            'prizes' => Harga_Model::all()
        ];

        return view('Admin/Buku/update_buku', $data);        
    }

    public function save_update(StoreBuku $request, int $id)
    {
        $buku = Buku_Model::where('id', $id)->first();

        $data_buku = [
            'hargaId' => $request->input('hargaId'),
            'genreId' => $request->input('genreId'),
            'penulisId' => $request->input('penulisId'),
            'judul_buku' => $request->input('judul_buku'),
            'stok_buku' => $request->input('stok_buku'),
            'jumlah_halaman' => $request->input('jumlah_halaman'),
            'tanggal_publikasi' => $request->input('tanggal_publikasi')
        ];

        if ($request->file('foto_buku')) {

            // Delete old picture
            if ($request->fotoBukuLama) {
                Storage::delete($request->fotoBukuLama);
            }
            $data_buku['foto_buku'] = $request->file('foto_buku')->store('Foto Buku');
        }

        //Update Data Buku Baru 
        Buku_Model::where('id', $buku->id)->update($data_buku);

        return redirect('/buku')->with('success-update', 'Buku Baru Berhasil Diubah');        
    }

    public function delete_buku(int $id)
    {
        // Getting specific data
        $buku = Buku_Model::where('id', $id)->first();

        // Delete picture
        if ($buku->foto_buku) {
            Storage::delete($buku->foto_buku);
        }

        // Delete data from table
        Buku_Model::where('id', $buku->id)->delete();

        return redirect('/buku')->with('danger', 'Buku Baru Berhasil Dihapus');
    }

}

