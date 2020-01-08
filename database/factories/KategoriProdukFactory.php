<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Kategori_Produk::class, function (Faker $faker) {
    return [
        'nama_kategori' => 'Pakaian'
    ];
});
