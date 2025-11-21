<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminOptionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'values' => $this->whenLoaded('values', function () {
                return $this->values->sortBy('sort_order')->map(fn ($v) => [
                    'id'         => $v->id,
                    'value'      => $v->value,
                    'sort_order' => (int) $v->sort_order,
                ])->values();
            }),
        ];
    }
}
