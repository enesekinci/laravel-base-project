<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CartItemResource;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'items'       => CartItemResource::collection($this->whenLoaded('items')),
            'subtotal'    => (float) $this->subtotal,
            'total'       => (float) $this->total,
            'items_count' => $this->items_count,
            'currency'    => $this->currency,
        ];
    }
}
