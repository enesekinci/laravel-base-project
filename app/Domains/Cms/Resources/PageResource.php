<?php

declare(strict_types=1);

namespace App\Domains\Cms\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Domains\Cms\Models\Page
 */
class PageResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_active' => (bool) $this->is_active,
            'show_in_footer' => (bool) $this->show_in_footer,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
