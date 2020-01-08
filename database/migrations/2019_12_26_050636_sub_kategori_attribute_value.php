<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubKategoriAttributeValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategori_attribute_value', function (Blueprint $table) {
            $table->increments('id_sub_kategori_attribute_value');
            $table->integer('sub_kategori_attribute_id')->unsigned();
            $table->foreign('sub_kategori_attribute_id')->references('id_sub_kategori_attribute')->on('sub_kategori_attribute');
            $table->string('nama_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_kategori_attribute_value', function (Blueprint $table) {
            //
        });
    }
}
