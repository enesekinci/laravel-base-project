<?php

declare(strict_types=1);

namespace App\Services\Blog;

use App\Models\Blog\Post;
use App\Services\ContentImageService;

class PostContentImageService
{
    public function __construct(
        private readonly ContentImageService $contentImageService
    ) {}

    /**
     * HTML içeriğinden resim URL'lerini çıkar
     *
     * @return array<string> Resim URL'leri
     */
    public function extractImageUrls(?string $content): array
    {
        return $this->contentImageService->extractImageUrls($content);
    }

    /**
     * Resim URL'inden storage path'ini çıkar
     */
    public function extractPathFromUrl(string $url, string $disk = 'r2'): ?string
    {
        return $this->contentImageService->extractPathFromUrl($url, 'blog', $disk);
    }

    /**
     * Post içeriğindeki kullanılmayan resimleri temizle
     */
    public function cleanupUnusedImages(Post $post, ?string $oldContent = null): void
    {
        $this->contentImageService->cleanupUnusedImages($post, 'blog', 'content', $oldContent);
    }

    /**
     * Post silindiğinde tüm editör resimlerini temizle
     */
    public function cleanupAllImages(Post $post): void
    {
        $this->contentImageService->cleanupAllImages($post, 'blog');
    }

    /**
     * Post'un library resimlerini temizle
     */
    public function cleanupLibraryImages(Post $post): void
    {
        $this->contentImageService->cleanupLibraryImages($post);
    }

    /**
     * Post güncellendiğinde kullanılmayan resimleri temizle
     */
    public function handlePostUpdate(Post $post, array $originalAttributes): void
    {
        $this->contentImageService->handleModelUpdate($post, 'blog', $originalAttributes);
    }
}
