<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalBuyToTblKeranjangBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_keranjang_buku', function (Blueprint $table) {
            $table->integer('jumlah_beli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_keranjang_buku', function (Blueprint $table) {
            $table->dropColumn('jumlah_beli');
        });
    }
}
