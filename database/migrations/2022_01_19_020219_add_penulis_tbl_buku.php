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
            $table->dropColumn('comment_count');
        });
    }
}
