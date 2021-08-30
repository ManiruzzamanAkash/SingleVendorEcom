<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
        'id' => $this->id,
        'product_id' => $this->product_id,
        'product_quantity' => $this->product_quantity,
        'product_size' => $this->product_size,
        'product' => $this->product,
        'image' => $this->product->images->first()->image,
      ];
    }
}
