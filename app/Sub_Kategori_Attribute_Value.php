<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Kategori_Attribute_Value extends Model
{
    protected $table = 'sub_kategori_attribute_value';
    protected $fillable = ['sub_kategori_attribute_id','nama_value'];
}
