<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubKategoriProdukIdentifireResource extends JsonResource
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
            'id_sub_kategori_produk' => $this->id_sub_kategori_produk,
            'nama_sub_kategori_produk' => $this->nama_sub_kategori_produk,
            'attribute' => KategoriAttributeIdentifierResource::collection($this->sub_kategori_attribute)
        ];
    }
}
