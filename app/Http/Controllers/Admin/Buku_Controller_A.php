<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Buku\BukuInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StoreBuku;

class Buku_Controller_A extends Controller
{
    public function __construct(BukuInterface_Admin $bukuInterface_Admin)
    {
        $this->bukuInterface_Admin = $bukuInterface_Admin;
    }

    public function get_buku()
    {
       return $this->bukuInterface_Admin->get_buku();
    }

    public function get_buku_excel()
    {
       return $this->bukuInterface_Admin->get_buku_excel();
    }

    public function tambah_buku()
    {
        return $this->bukuInterface_Admin->tambah_buku();
    }

     public function save_buku(StoreBuku $request)
     {
        return $this->bukuInterface_Admin->save_buku($request);
     }

     public function update_buku(int $id)
     {
        return $this->bukuInterface_Admin->update_buku($id);
     }

     public function save_update(StoreBuku $request,int $id)
     {
        return $this->bukuInterface_Admin->save_update($request, $id);
     }

     public function delete_buku(int $id)
     {
        return $this->bukuInterface_Admin->delete_buku($id);
     }
}
