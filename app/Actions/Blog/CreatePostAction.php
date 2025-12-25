<?php

declare(strict_types=1);

namespace App\Actions\Blog;

use App\Contracts\Blog\PostRepositoryInterface;
use App\Events\Blog\PostCreated;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class CreatePostAction
{
    public function __construct(
        private readonly PostRepositoryInterface $repository,
    ) {}

    public function handle(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            // Slug oluştur
            if (empty($data['slug']) && ! empty($data['title'])) {
                $data['slug'] = Str::slug($data['title']);
            }

            // Slug unique kontrolü
            $originalSlug = $data['slug'];
            $counter = 1;
            while (Post::where('slug', $data['slug'])->exists()) {
                $data['slug'] = $originalSlug.'-'.$counter;
                $counter++;
            }

            // İlişki alanlarını ayır
            $categoryIds = $data['category_ids'] ?? null;
            $tagIds = $data['tag_ids'] ?? null;

            unset($data['category_ids'], $data['tag_ids']);

            $post = $this->repository->create($data);

            // İlişkileri ekle
            if ($categoryIds !== null) {
                $post->categories()->sync($categoryIds);
            }

            if ($tagIds !== null) {
                $post->tags()->sync($tagIds);
            }

            event(new PostCreated($post));

            return $post->load(['author', 'media', 'categories', 'tags']);
        });
    }
}
