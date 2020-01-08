<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['id_kategori_produk','nama_produk','satuan','berat','harga_modal','harga_jual','diskon','stok','keterangan','tipe_produk','ket','foto'];

    public function kategori()
    {
        return $this->hasOne('App\Kategori_Produk', 'id_kategori_produk', 'id_kategori_produk');
    }

    public function option()
    {
        return $this->hasMany('App\Produk_Option', 'produk_id', 'id_produk');
    }

    public function optionValue()
    {
        return $this->hasMany('App\Produk_Option_Value', 'produk_id', 'id_produk');
    }

    public function sub_kategori()
    {
        return $this->hasOne('App\Sub_Kategori_Produk', 'id_sub_kategori_produk', 'sub_kategori_produk_id');
    }

    // public function optionValue()
    // {
    //     return $this->hasManyThrough('App\Produk_Option', 'App\Produk_Option_Value', 'produk_id', 'id_produk_option', 'id_produk', 'produk_option_id');
    //     // return $this->hasManyThrough('App\Produk_Option_Value', 'App\Produk_Option', 'produk_id', 'id_produk_option', 'id_produk', 'produk_option_id');
    // }
}
