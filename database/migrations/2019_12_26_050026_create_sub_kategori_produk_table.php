<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKategoriProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategori_produk', function (Blueprint $table) {
            $table->increments('id_sub_kategori_produk');
            $table->integer('kategori_produk_id')->unsigned();
            $table->foreign('kategori_produk_id')->references('id_kategori_produk')->on('kategori_produk');
            $table->string('nama_sub_kategori_produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_kategori_produk');
    }
}
