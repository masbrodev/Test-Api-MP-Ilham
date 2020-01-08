<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('nama_produk');
            $table->string('satuan');// inc
            $table->integer('berat');// inc
            $table->integer('harga_modal');// inc
            $table->integer('harga_jual');// inc
            $table->integer('diskon');// inc
            $table->integer('stok');// inc
            $table->longText('keterangan');
            $table->string('foto');
            $table->enum('tipe_produk', ['single','varian']);
            // $table->integer('pelapak_id')->unsigned();// inc
            $table->integer('wishlist');
            $table->integer('terjual');
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
        Schema::dropIfExists('produk');
    }
}
