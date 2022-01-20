<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Penulis\PenulisInterface_Admin;

// Memanggil request Buatan Sendiri
use App\Http\Requests\StorePenulis;

class Penulis_Controller_A extends Controller
{
    public function __construct(PenulisInterface_Admin $penulisInterface_Admin)
    {
        $this->penulisInterface_Admin = $penulisInterface_Admin;
    }
     
    public function get_penulis()
    {
       return $this->penulisInterface_Admin->get_penulis();
    }

    public function tambah_penulis()
    {
        return $this->penulisInterface_Admin->tambah_penulis();
    }

     public function save_penulis(StorePenulis $request)
     {
        return $this->penulisInterface_Admin->save_penulis($request);
     }

     public function update_penulis(int $id)
     {
        return $this->penulisInterface_Admin->update_penulis($id);
     }

     public function save_update(StorePenulis $request,int $id)
     {
        return $this->penulisInterface_Admin->save_update($request, $id);
     }

     public function delete_penulis(int $id)
     {
        return $this->penulisInterface_Admin->delete_penulis($id);
     }
}
