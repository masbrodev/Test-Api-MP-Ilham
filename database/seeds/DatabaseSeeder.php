<?php

use App\Produk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\Kategori_Produk::class, 1)->create();
        factory(App\Produk::class, 1)->create();
        // factory(App\Produk_Option::class, 1)->create();
        // factory(App\Produk_Option_Value::class, 3)->create();
    }
}
