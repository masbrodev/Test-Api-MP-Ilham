<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubKategoriAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategori_attribute', function (Blueprint $table) {
            $table->increments('id_sub_kategori_attribute');
            $table->integer('sub_kategori_produk_id')->unsigned();
            $table->foreign('sub_kategori_produk_id')->references('id_sub_kategori_produk')->on('sub_kategori_produk');
            $table->string('nama_attribute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_kategori_produk_attribute');
    }
}
