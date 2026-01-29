<?php

declare(strict_types=1);

namespace App\DTO\Blog;

readonly class PostCategoryData
{
    public function __construct(
        public string $name,
        public string $slug,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            slug: $data['slug'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
