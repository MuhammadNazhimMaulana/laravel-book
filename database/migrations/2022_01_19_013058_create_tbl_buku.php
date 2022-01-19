<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hargaId')->constrained('tbl_harga');
            $table->foreignId('genreId')->constrained('tbl_genre');
            $table->string('judul_buku', 121);
            $table->integer('jumlah_halaman');
            $table->date('tanggal_publikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_buku');
    }
}
