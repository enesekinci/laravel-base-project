<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminProductVariantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'price' => $this->price !== null ? (float) $this->price : null,
            'quantity' => (int) $this->quantity,
            'is_active' => (bool) $this->is_active,
            // istersen option_values'ı da ekleyebilirsin:
            'option_values' => $this->whenLoaded('optionValues', function () {
                return $this->optionValues->map(fn ($ov) => [
                    'id' => $ov->id,
                    'value' => $ov->value,
                    'option' => [
                        'id' => $ov->option->id,
                        'name' => $ov->option->name,
                    ],
                ]);
            }),
        ];
    }
}
