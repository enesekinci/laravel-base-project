<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminTransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'payment_method_id' => $this->payment_method_id,
            'gateway' => $this->gateway,
            'gateway_transaction_id' => $this->gateway_transaction_id,
            'type' => $this->type,
            'status' => $this->status,
            'amount' => (float) $this->amount,
            'currency' => $this->currency,
            'message' => $this->message,
            'processed_at' => optional($this->processed_at)->toIso8601String(),
            'created_at' => optional($this->created_at)->toIso8601String(),

            'order' => $this->whenLoaded('order', function () {
                return [
                    'id' => $this->order->id,
                    'status' => $this->order->status,
                    'payment_status' => $this->order->payment_status,
                    'grand_total' => (float) $this->order->grand_total,
                    'customer_email' => $this->order->customer_email,
                ];
            }),

            'payment_method' => $this->whenLoaded('paymentMethod', function () {
                return [
                    'id' => $this->paymentMethod->id,
                    'name' => $this->paymentMethod->name,
                    'code' => $this->paymentMethod->code,
                    'type' => $this->paymentMethod->type,
                ];
            }),
        ];
    }
}
