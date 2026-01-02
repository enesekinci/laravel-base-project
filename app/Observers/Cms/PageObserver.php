<?php

declare(strict_types=1);

namespace App\Observers\Cms;

use App\Models\Cms\Page;
use App\Services\ContentImageService;

class PageObserver
{
    public function __construct(
        private readonly ContentImageService $contentImageService
    ) {}

    /**
     * Handle the Page "deleting" event.
     * Soft delete veya force delete için resimleri temizle
     */
    public function deleting(Page $page): void
    {
        $this->contentImageService->cleanupAllImages($page, 'cms', 'content');
    }

    /**
     * Handle the Page "updating" event.
     * Kullanılmayan resimleri temizle
     */
    public function updating(Page $page): void
    {
        $originalAttributes = $page->getOriginal();
        $this->contentImageService->handleModelUpdate($page, 'cms', $originalAttributes, 'content');
    }
}
