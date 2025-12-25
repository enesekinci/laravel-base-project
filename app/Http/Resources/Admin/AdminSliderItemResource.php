<?php

declare(strict_types=1);

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Domains\Cms\Models\SliderItem
 */
class AdminSliderItemResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'media_file_id' => $this->media_file_id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'button_text' => $this->button_text,
            'button_url' => $this->button_url,
            'link_url' => $this->link_url,
            'sort_order' => $this->sort_order,
            'is_active' => (bool) $this->is_active,
            'meta' => $this->meta,
            'media' => $this->whenLoaded('media'),
        ];
    }
}
