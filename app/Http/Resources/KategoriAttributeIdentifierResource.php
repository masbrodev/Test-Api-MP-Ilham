<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriAttributeIdentifierResource extends JsonResource
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
            'id_sub_kategori_attribute' => $this->id_sub_kategori_attribute,
            'nama_attribute' => $this->nama_attribute,
            'value' => new AttributeValueIdentifierResource($this->attribute_value)
            // 'value' => $this->whenLoaded('sub_kategori') ? new AttributeValueIdentifierResource($this->attribute_value) : ''
        ];
    }
}
