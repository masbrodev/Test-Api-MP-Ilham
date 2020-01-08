<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Produk;
use Faker\Generator as Faker;

$factory->define(App\Produk::class, function (Faker $faker) {
    return [
        'id_kategori_produk' => 1,
        'nama_produk' => 'Baju Distro',
        'satuan' => 'pcs',
        'harga_modal' => 50000,
        'berat' => 2,
        'harga_jual' => 60000,
        'diskon' => 0,
        'stok' => 20,
        'keterangan' => 'Baju Distro Keren dengan bahan berkualitas dan terjamin keasliannya',
        'foto' => '',
        'tipe_produk' => 'varian',
        'id_kategori_produk' => 1,
        'sub_kategori_produk_id' => 1,
        // 'produk_option_id' => 1,
        // 'id_pelapak' => 1,
        'wishlist' => 0,
        'terjual' => 0
    ];
});
