<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminSliderItemResource extends JsonResource
{
    public function toArray($request)
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
