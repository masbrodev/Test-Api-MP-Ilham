<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Produk_Option::class, function (Faker $faker) {
    return [
        'produk_id' => 1,
        'nama_produk_option' => 'ukuran'
    ];
});
