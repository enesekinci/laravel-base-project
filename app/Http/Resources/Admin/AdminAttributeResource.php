<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminAttributeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'is_filterable' => (bool) $this->is_filterable,

            'attribute_set' => $this->whenLoaded('attributeSet', function () {
                return [
                    'id' => $this->attributeSet?->id,
                    'name' => $this->attributeSet?->name,
                ];
            }),

            'values' => $this->whenLoaded('values', function () {
                return $this->values->sortBy('sort_order')->map(fn ($v) => [
                    'id' => $v->id,
                    'value' => $v->value,
                    'sort_order' => (int) $v->sort_order,
                ])->values();
            }),
        ];
    }
}
