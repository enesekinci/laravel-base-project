<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Slider
 */
class AdminSliderResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'is_active' => (bool) $this->is_active,
            'sort_order' => $this->sort_order,
            'created_at' => optional($this->created_at)->toIso8601String(),
            'items' => AdminSliderItemResource::collection(
                $this->whenLoaded('items')
            ),
        ];
    }
}
