<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Produk_Option_Value::class, function (Faker $faker) {
    return [
        'produk_option_id' => 1,
        'nama_produk_option_value' => 'M'
    ];
});
