<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminOrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'status'         => $this->status,
            'payment_status' => $this->payment_status,
            'payment_method' => $this->payment_method,
            'currency'       => $this->currency,
            'subtotal'       => $this->subtotal,
            'discount_total' => $this->discount_total,
            'tax_total'      => $this->tax_total,
            'shipping_total' => $this->shipping_total,
            'grand_total'    => $this->grand_total,
            'coupon_code'    => $this->coupon_code,
            'coupon_discount'=> $this->coupon_discount,
            'customer_email' => $this->customer_email,
            'customer_name'  => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'placed_at'      => optional($this->placed_at)->toIso8601String(),
            'items' => $this->whenLoaded('items', function () {
                return $this->items->map(fn ($item) => [
                    'id'         => $item->id,
                    'name'       => $item->name,
                    'sku'        => $item->sku,
                    'unit_price' => $item->unit_price,
                    'quantity'   => $item->quantity,
                    'subtotal'   => $item->subtotal,
                    'total'      => $item->total,
                ]);
            }),
        ];
    }
}
