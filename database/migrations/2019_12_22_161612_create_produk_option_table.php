<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_option', function (Blueprint $table) {
            $table->increments('id_produk_option');
            $table->integer('produk_id')->unsigned();
            $table->foreign('produk_id')->references('id_produk')->on('produk');
            $table->string('nama_produk_option');
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
        Schema::dropIfExists('produk_option');
    }
}
