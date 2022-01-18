<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre_Model extends Model
{
    use HasFactory;
    
    // Nama Tabel
    protected $table = 'tbl_genre';

    // primary key
    protected $primaryKey = 'id_genre';

    // Fillable
    protected $fillable = ['nama_genre', 'created_at', 'updated_at'];
}
