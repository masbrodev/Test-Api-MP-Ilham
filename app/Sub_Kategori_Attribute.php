<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Kategori_Attribute extends Model
{
    protected $table = 'sub_kategori_attribute';
    protected $fillable = ['nama_attribute','sub_kategori_produk_id'];

    public function sub_kat()
    {
        return $this->belongsTo('App\Sub_Kategori_Produk', 'sub_kategori_produk_id', 'id_sub_kategori_produk');
    }

    public function attribute_value()
    {
        return $this->hasOne('App\Sub_Kategori_Attribute_Value', 'sub_kategori_attribute_id', 'id_sub_kategori_attribute');
    }
}
