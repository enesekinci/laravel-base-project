<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'price' => $this->getEffectivePrice(),
            'in_stock' => $this->isInStock(),
            'is_active' => (bool) $this->is_active,
            'option_values' => OptionValueResource::collection(
                $this->whenLoaded('optionValues')
            ),
        ];
    }
}
