<?php

declare(strict_types=1);

namespace App\Actions\Blog;

use App\Contracts\Blog\PostRepositoryInterface;
use App\Events\Blog\PostUpdated;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class UpdatePostAction
{
    public function __construct(
        private readonly PostRepositoryInterface $repository,
    ) {}

    public function handle(Post $post, array $data): Post
    {
        return DB::transaction(function () use ($post, $data) {
            // Slug oluştur (eğer title değiştiyse)
            if (isset($data['title']) && $data['title'] !== $post->title) {
                if (empty($data['slug'])) {
                    $data['slug'] = Str::slug($data['title']);
                }

                // Slug unique kontrolü (mevcut post hariç)
                $originalSlug = $data['slug'];
                $counter = 1;
                while (Post::where('slug', $data['slug'])->where('id', '!=', $post->id)->exists()) {
                    $data['slug'] = $originalSlug.'-'.$counter;
                    $counter++;
                }
            }

            // İlişki alanlarını ayır
            $categoryIds = $data['category_ids'] ?? null;
            $tagIds = $data['tag_ids'] ?? null;

            unset($data['category_ids'], $data['tag_ids']);

            $this->repository->update($post, $data);

            // İlişkileri güncelle
            if ($categoryIds !== null) {
                $post->categories()->sync($categoryIds);
            }

            if ($tagIds !== null) {
                $post->tags()->sync($tagIds);
            }

            event(new PostUpdated($post));

            return $post->fresh()->load(['author', 'media', 'categories', 'tags']);
        });
    }
}
