<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukOptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'id_produk_option'  => $this->id_produk_option,
           'nama_produk_option' => $this->nama_produk_option,
        //    'produk' => [
        //        'id_produk' => $this->produk->id_produk,
        //        'nama_produk' => $this->produk->nama_produk
        //    ],
           'optionValue' => OptionValueIdentifierResource::collection($this->value)
        ];
    }
}
