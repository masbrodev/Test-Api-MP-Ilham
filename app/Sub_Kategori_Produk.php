<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Kategori_Produk extends Model
{
    protected $table = 'sub_kategori_produk';
    protected $fillable = ['nama_sub_kategori_produk','kategori_produk_id'];

    // public function kategori_produk()
    // {
    //     return $this->belongsToMany('App\Kategori_produk');
    // }

    public function sub_kategori_attribute()
    {
        return $this->hasMany('App\Sub_Kategori_Attribute', 'sub_kategori_produk_id', 'id_sub_kategori_produk');
    }
}
