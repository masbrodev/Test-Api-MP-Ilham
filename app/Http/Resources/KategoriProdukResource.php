<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriProdukResource extends JsonResource
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
            'id_kategori_produk' => $this->id_kategori_produk,
            'nama_kategori' => $this->nama_kategori,
            'sub_kategori' => SubKategoriProdukIdentifireResource::collection($this->sub_kategori_produk)
        ];
    }
}
