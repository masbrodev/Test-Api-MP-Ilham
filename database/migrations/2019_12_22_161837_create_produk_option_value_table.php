<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukOptionValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_option_value', function (Blueprint $table) {
            $table->increments('id_produk_option_value');
            $table->integer('produk_option_id')->unsigned();
            $table->foreign('produk_option_id')->references('id_produk_option')->on('produk_option');
            $table->string('nama_produk_option_value');
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
        Schema::dropIfExists('produk_option_value');
    }
}
