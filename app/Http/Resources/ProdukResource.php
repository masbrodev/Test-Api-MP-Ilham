<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
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
            'id_produk' => $this->id_produk,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga_jual,
            'diskon' => $this->diskon,
            'kategori' => new KategoriProdukResource($this->kategori),
            'kategori' => [
                'id_kategori' => $this->kategori->id_kategori_produk,
                'nama_kategori' => $this->kategori->nama_kategori,
                'sub_kategori' => new SubKategoriProdukIdentifireResource($this->sub_kategori)
            ],
            // 'varian' => ProdukOptionResource::collection($this->option)
            'variasi' => json_decode($this->ket, true)
        ];
    }

    public function with($request)
    {
        $option = $this->collection->flatMap(
            function ($produk) {
                return $produk->option;
            }
        );
        // $authors  = $this->collection->map(
        //     function ($article) {
        //         return $article->author;
        //     }
        // );

        $included = $this->merge($option)->unique('id_produk');

        return [
            'links'    => [
                'self' => route('articles.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof People) {
                    return new ProdukOptionResource($include);
                }
            }
        );
    }
}
