<?php 

namespace App\Repositories\Admin\Buku;

// Interface
use App\Interfaces\Admin\Buku\BukuInterface_Admin;

// Model
use App\Models\Buku_Model;

// Request
use App\Http\Requests\StoreBuku;

class BukuRepository_Admin implements BukuInterface_Admin
{

    public function get_buku()
    {
        $data = [
            'title' => 'Buku',
            'books' => Buku_Model::paginate(5)
        ];

        return view('Admin/Buku/view_buku', $data);
    }

    public function tambah_buku()
    {
        $data = [
            'title' => 'Buku'
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
            'jumlah_halaman' => $request->input('jumlah_halaman'),
            'tanggal_publikasi' => $request->input('tanggal_publikasi')
        ];

        //Create Data Buku Baru 
        Buku_Model::create($data_buku);

        return redirect('/buku')->with('success', 'Buku Baru Berhasil Ditambahkan');
    }

    public function update_buku(int $id)
    {
        $buku = Buku_Model::where('id', $id)->first();

        $data = [
            'title' => 'Buku',
            'books' => $buku
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
            'jumlah_halaman' => $request->input('jumlah_halaman'),
            'tanggal_publikasi' => $request->input('tanggal_publikasi')
        ];

        //Create Data Buku Baru 
        Buku_Model::where('id', $buku->id)->update($data_buku);

        return redirect('/buku')->with('success-update', 'Buku Baru Berhasil Diubah');        
    }

    public function delete_buku(int $id)
    {
        // Getting specific data
        $buku = Buku_Model::where('id', $id)->first();

        // Delete data from table
        Buku_Model::where('id', $buku->id)->delete();

        return redirect('/buku')->with('danger', 'Buku Baru Berhasil Dihapus');
    }

}

