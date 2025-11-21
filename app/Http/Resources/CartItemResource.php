<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'quantity'    => $this->quantity,
            'unit_price'  => (float) $this->unit_price,
            'total_price' => (float) $this->total_price,
            'product'     => [
                'id'   => $this->product->id,
                'name' => $this->product->name,
                'slug' => $this->product->slug,
            ],
            'variant_id'  => $this->product_variant_id,
        ];
    }
}
