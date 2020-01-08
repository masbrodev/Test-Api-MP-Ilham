<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk_Option extends Model
{
    protected $table = 'produk_option';
    protected $primaryKey = 'id_produk_option';
    protected $fillable = ['produk_id','nama_produk_option'];

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'produk_id', 'id_produk');
    }

    public function value()
    {
        return $this->hasMany('App\Produk_Option_Value', 'produk_option_id', 'id_produk_option');
    }
}
