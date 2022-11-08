<?php 

namespace App\Repositories\Admin\Dashboard;

// Interface
use App\Interfaces\Admin\Dashboard\UtamaInterface_Admin;

// Model
use App\Models\{User, Pembelian_Model};

class UtamaRepository_Admin implements UtamaInterface_Admin
{

    public function utama()
    {
        $transactions = Pembelian_Model::get()->groupBy('userId');

        
        // Preparing List
        $names = [];
        $total_transaction = [];
        foreach($transactions as $transaction){
            array_push($names, $transaction[0]->user->username);

            $total = 0;
            foreach($transaction as $trans){
                $total +=  $trans->jumlah_beli;
            }

            array_push($total_transaction, $total);
        }

        $data = [
            'title' => 'Dashboard',
            'names' => $names,
            'transaction_data' => $total_transaction
        ];

        return view('Admin/Utama/dashboard_admin', $data);
    }

}

