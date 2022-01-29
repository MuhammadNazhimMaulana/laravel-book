<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangBuku_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_keranjang_buku';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['pembelianId', 'bukuId', 'harga_buku', 'jumlah_beli','created_at', 'updated_at'];

    // Relationship
    public function buku()
    {
        return $this->belongsTo(Buku_Model::class, 'bukuId');
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian_Model::class, 'pembelianId');
    }
}
