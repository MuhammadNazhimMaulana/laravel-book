<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings_Model extends Model
{
    // Untuk Factory
    use HasFactory;

    // Nama Tabel
    protected $table = 'tbl_settings';

    // primary key
    protected $primaryKey = 'id';

    // Fillable
    protected $fillable = ['userId', 'nama_toko', 'logo_toko', 'data_per_halaman', 'created_at', 'updated_at'];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
