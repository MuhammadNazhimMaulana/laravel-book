<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_pembelian';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['userId', 'bukuId', 'jumlah_beli', 'total_harga', 'created_at', 'updated_at'];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function buku()
    {
        return $this->belongsTo(Buku_Model::class, 'bukuId');
    }

}
