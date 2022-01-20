<?php 

namespace App\Repositories\Admin\Dashboard;

// Interface
use App\Interfaces\Admin\Dashboard\UtamaInterface_Admin;

// Model
use App\Models\User;

class UtamaRepository_Admin implements UtamaInterface_Admin
{

    public function utama()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        return view('Admin/Utama/dashboard_admin', $data);
    }

}

