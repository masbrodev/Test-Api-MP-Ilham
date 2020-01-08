<?php

namespace App\Http\Resources;

use App\Produk_Option;
use App\Produk_Option_Value;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProdukCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ProdukResource::collection($this->collection)
        ];
    }


}
