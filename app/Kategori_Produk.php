<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_Produk extends Model
{
    protected $table = 'kategori_produk';
    protected $fillable = ['id_kategori_produk','nama_kategori'];

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'id_kategori_produk', 'id_kategori_produk');
    }

    public function sub_kategori_produk()
    {
        return $this->hasMany('App\Sub_Kategori_Produk', 'kategori_produk_id', 'id_kategori_produk');
    }
}
