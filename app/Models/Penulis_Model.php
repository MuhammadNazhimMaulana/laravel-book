<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_penulis';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['nama_penulis', 'umur_penulis','created_at', 'updated_at'];

    // Inverse
    public function buku()
    {
        return $this->hasOne(Buku_Model::class, 'penulisId');
    }
}
