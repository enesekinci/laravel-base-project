<?php

declare(strict_types=1);

namespace App\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        $post = $this->resource;
        // published_at model'de datetime cast edilmiş, Carbon instance olmalı
        $publishedAt = $post->published_at;
        $publishedAtString = $publishedAt ? $publishedAt->toIso8601String() : null;

        return [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'excerpt' => $post->excerpt,
            'content' => $post->content,
            'status' => $post->status,
            'published_at' => $publishedAtString,
            'meta_title' => $post->meta_title,
            'meta_description' => $post->meta_description,
            'author' => $this->whenLoaded('author'),
            'media' => $this->whenLoaded('media'),
            'categories' => $this->whenLoaded('categories'),
            'tags' => $this->whenLoaded('tags'),
            'created_at' => $post->created_at?->toIso8601String(),
            'updated_at' => $post->updated_at?->toIso8601String(),
        ];
    }
}
