<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_harga';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['harga_satuan', 'created_at', 'updated_at'];

    // Inverse
    public function buku()
    {
        return $this->hasOne(Buku_Model::class, 'hargaId');
    }
}
