<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        // attributes include'u var mı?
        $includeAttributes = str_contains($request->query('include', ''), 'attributes');
        $includeVariants = str_contains($request->query('include', ''), 'variants');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'price' => $this->getEffectivePrice(),
            'in_stock' => $this->isInStock(),
            'is_active' => (bool) $this->is_active,

            'variants' => $this->when(
                $includeVariants && $this->relationLoaded('variants'),
                fn () => ProductVariantResource::collection($this->variants)
            ),

            'attributes' => $this->when(
                $includeAttributes && $this->relationLoaded('attributeValues'),
                function () {
                    return $this->attributeValues->map(function ($value) {
                        return [
                            'code' => $value->attribute->slug,
                            'label' => $value->attribute->name,
                            'value' => $value->typed_value,
                        ];
                    })->values();
                }
            ),
        ];
    }
}
