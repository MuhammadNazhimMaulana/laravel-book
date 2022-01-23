<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_buku';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['hargaId', 'genreId', 'penulisId', 'judul_buku', 'foto_buku', 'stok_buku', 'jumlah_halaman', 'tanggal_publikasi', 'created_at', 'updated_at'];

    // Relationship
    public function harga()
    {
        return $this->belongsTo(Harga_Model::class, 'hargaId');
    }

    public function genre()
    {
        return $this->belongsTo(Genre_Model::class, 'genreId');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis_Model::class, 'penulisId');
    }

    // Inverse
    public function keranjang()
    {
        return $this->hasOne(KeranjangBuku_Model::class, 'bukuId');
    }
}
