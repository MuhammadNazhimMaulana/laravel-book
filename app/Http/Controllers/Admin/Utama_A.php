<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Memanggil Interface
use App\Interfaces\Admin\Dashboard\UtamaInterface_Admin;

class Utama_A extends Controller
{
    public function __construct(UtamaInterface_Admin $utamaInterface_Admin)
    {
        $this->utamaInterface_Admin = $utamaInterface_Admin;
    }
     
    public function utama()
    {
       return $this->utamaInterface_Admin->utama();
    }

}
