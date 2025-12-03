<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Domains\Media\Models\MediaFile
 */
class AdminMediaFileResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'disk' => $this->disk,
            'path' => $this->path,
            'filename' => $this->filename,
            'mime_type' => $this->mime_type,
            'size' => $this->size,
            'width' => $this->width,
            'height' => $this->height,
            'collection' => $this->collection,
            'alt' => $this->alt,
            'is_private' => (bool) $this->is_private,
            'url' => $this->url,
            'created_at' => optional($this->created_at)->toIso8601String(),
        ];
    }
}
