<?php

declare(strict_types=1);

namespace App\Observers\Blog;

use App\Models\Blog\Post;
use App\Services\Blog\PostContentImageService;

class PostObserver
{
    public function __construct(
        private readonly PostContentImageService $postContentImageService
    ) {}

    /**
     * Handle the Post "deleting" event.
     * Soft delete veya force delete için resimleri temizle
     */
    public function deleting(Post $post): void
    {
        $this->postContentImageService->cleanupAllImages($post);
    }

    /**
     * Handle the Post "updating" event.
     * Kullanılmayan resimleri temizle
     */
    public function updating(Post $post): void
    {
        $originalAttributes = $post->getOriginal();
        $this->postContentImageService->handlePostUpdate($post, $originalAttributes);
    }
}
