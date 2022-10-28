<?php 

namespace App\Repositories\Admin\Penulis;

// Interface
use App\Interfaces\Admin\Penulis\PenulisInterface_Admin;

// Model
use App\Models\Penulis_Model;

// Request
use App\Http\Requests\StorePenulis;

// Excel
use App\Exports\PenulisExport;
use Maatwebsite\Excel\Facades\Excel;

class PenulisRepository_Admin implements PenulisInterface_Admin
{
    const PER_PAGE = 5;

    public function get_penulis()
    {
        $data = [
            'title' => 'Penulis',
            'writers' => Penulis_Model::paginate(self::PER_PAGE)
        ];

        return view('Admin/Penulis/view_penulis', $data);
    }

    public function get_penulis_excel()
    {
        return Excel::download(new PenulisExport, 'writers.xlsx');
    }

    public function tambah_penulis()
    {
        $data = [
            'title' => 'Penulis'
        ];

        return view('Admin/Penulis/create_penulis', $data);
    }

    public function save_penulis(StorePenulis $request)
    {
        $data_penulis = [
            'nama_penulis' => $request->input('nama_penulis'),
            'umur_penulis' => $request->input('umur_penulis')
        ];

        //Create Data Penulis Baru 
        Penulis_Model::create($data_penulis);

        return redirect('/penulis')->with('success', 'Penulis Baru Berhasil Ditambahkan');
    }

    public function update_penulis(int $id)
    {
        $penulis = Penulis_Model::where('id', $id)->first();

        $data = [
            'title' => 'Penulis',
            'penulis' => $penulis
        ];

        return view('Admin/Penulis/update_penulis', $data);        
    }

    public function save_update(StorePenulis $request, int $id)
    {
        $penulis = Penulis_Model::where('id', $id)->first();

        $data_penulis = [
            'nama_penulis' => $request->input('nama_penulis'),
            'umur_penulis' => $request->input('umur_penulis')
        ];

        //Create Data Penulis Baru 
        Penulis_Model::where('id', $penulis->id)->update($data_penulis);

        return redirect('/penulis')->with('success-update', 'Penulis Baru Berhasil Diubah');        
    }

    public function delete_penulis(int $id)
    {
        // Getting specific data
        $penulis = Penulis_Model::where('id', $id)->first();

        // Delete data from table
        Penulis_Model::where('id', $penulis->id)->delete();

        return redirect('/penulis')->with('danger', 'Penulis Baru Berhasil Dihapus');
    }

}

