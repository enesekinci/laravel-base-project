<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminShippingMethodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'code'           => $this->code,
            'type'           => $this->type,
            'price'          => (float) $this->price,
            'min_cart_total' => (float) $this->min_cart_total,
            'is_active'      => (bool) $this->is_active,
            'sort_order'     => (int) $this->sort_order,
            'config'         => $this->config,
            'created_at'     => optional($this->created_at)->toIso8601String(),
        ];
    }
}
