<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKeranjangBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_keranjang_buku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bukuId')->constrained('tbl_buku');
            $table->foreignId('pembelianId')->constrained('tbl_pembelian');
            $table->bigInteger('harga_buku');
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
        Schema::dropIfExists('tbl_keranjang_buku');
    }
}
