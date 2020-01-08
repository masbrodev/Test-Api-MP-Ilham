<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk_Option_Value extends Model
{
    protected $table = 'produk_option_value';
    protected $primaryKey = 'id_produk_option_value';
    protected $fillable = ['nama_produk_option_value'];
}
