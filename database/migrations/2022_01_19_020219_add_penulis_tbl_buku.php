<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenulisTblBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_buku', function (Blueprint $table) {
            $table->foreignId('penulisId')->constrained('tbl_penulis');
            $table->integer('stok_buku');
            $table->string('foto_buku');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_buku', function (Blueprint $table) {
            $table->dropForeign('tbl_buku_penulisid_foreign');
            $table->dropColumn('penulisId');
            $table->dropColumn('stok_buku');
            $table->dropColumn('foto_buku');
            $table->dropColumn('path');
        });
    }
}
