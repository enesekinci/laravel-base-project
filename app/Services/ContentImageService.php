<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentImageService
{
    public function extractImageUrls(?string $content): array
    {
        if (empty($content)) {
            return [];
        }

        $urls = [];
        $pattern = '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i';

        if (preg_match_all($pattern, $content, $matches)) {
            $urls = $matches[1];
        }

        return array_unique($urls);
    }

    public function extractPathFromUrl(string $url, string $module, string $disk = 'r2'): ?string
    {
        $diskConfig = config("filesystems.disks.{$disk}", []);
        $publicUrl = $diskConfig['url'] ?? '';

        if (empty($publicUrl)) {
            return null;
        }

        // URL'den path'i çıkar
        $path = str($url)
            ->after($publicUrl)
            ->before('?')
            ->ltrim('/')
            ->toString();

        // Sadece belirtilen modülün editor klasöründeki resimleri işle
        if (! str_starts_with($path, "{$module}/editor/")) {
            return null;
        }

        return $path;
    }

    public function cleanupUnusedImages(
        Model $model,
        string $module,
        string $contentField = 'content',
        ?string $oldContent = null,
        string $disk = 'r2'
    ): void {
        $currentContent = $model->getAttribute($contentField);
        $currentUrls = $this->extractImageUrls($currentContent);
        $oldUrls = $oldContent ? $this->extractImageUrls($oldContent) : [];

        $unusedUrls = array_diff($oldUrls, $currentUrls);

        foreach ($unusedUrls as $url) {
            $path = $this->extractPathFromUrl($url, $module, $disk);

            if ($path && Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->delete($path);
            }
        }
    }

    public function cleanupAllImages(
        Model $model,
        string $module,
        string $contentField = 'content',
        string $disk = 'r2'
    ): void {
        $content = $model->getAttribute($contentField);
        $urls = $this->extractImageUrls($content);

        foreach ($urls as $url) {
            $path = $this->extractPathFromUrl($url, $module, $disk);

            if ($path && Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->delete($path);
            }
        }

        $this->cleanupLibraryImages($model, $module, $disk);
    }

    public function cleanupLibraryImages(Model $model, string $module, string $disk = 'r2'): void
    {
        $library = $model->getAttribute('library');

        if (! $library || $library->isEmpty()) {
            return;
        }

        foreach ($library as $item) {
            if (isset($item['path']) && str_starts_with($item['path'], "{$module}/library/")) {
                if (Storage::disk($disk)->exists($item['path'])) {
                    Storage::disk($disk)->delete($item['path']);
                }
            }
        }
    }

    public function handleModelUpdate(
        Model $model,
        string $module,
        array $originalAttributes,
        string $contentField = 'content',
        string $disk = 'r2'
    ): void {
        if (isset($originalAttributes[$contentField]) && $originalAttributes[$contentField] !== $model->getAttribute($contentField)) {
            $this->cleanupUnusedImages(
                $model,
                $module,
                $contentField,
                $originalAttributes[$contentField],
                $disk
            );
        }
    }
}
