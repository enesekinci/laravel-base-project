<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentImageService
{
    /**
     * HTML içeriğinden resim URL'lerini çıkar
     *
     * @return array<string> Resim URL'leri
     */
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

    /**
     * Resim URL'inden storage path'ini çıkar
     *
     * @param  string  $url  Resim URL'i
     * @param  string  $module  Modül adı (blog, cms, vs.)
     * @param  string  $disk  Storage disk adı
     * @return string|null Storage path veya null
     */
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

    /**
     * Model içeriğindeki kullanılmayan resimleri temizle
     *
     * @param  Model  $model  Model instance
     * @param  string  $module  Modül adı (blog, cms, vs.)
     * @param  string  $contentField  Content field adı (content)
     * @param  string|null  $oldContent  Eski içerik
     * @param  string  $disk  Storage disk adı
     */
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

        // Eski içerikte olan ama yeni içerikte olmayan URL'leri bul
        $unusedUrls = array_diff($oldUrls, $currentUrls);

        foreach ($unusedUrls as $url) {
            $path = $this->extractPathFromUrl($url, $module, $disk);

            if ($path && Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->delete($path);
            }
        }
    }

    /**
     * Model silindiğinde tüm editör resimlerini temizle
     *
     * @param  Model  $model  Model instance
     * @param  string  $module  Modül adı (blog, cms, vs.)
     * @param  string  $contentField  Content field adı (content)
     * @param  string  $disk  Storage disk adı
     */
    public function cleanupAllImages(
        Model $model,
        string $module,
        string $contentField = 'content',
        string $disk = 'r2'
    ): void {
        // Editör içeriğindeki resimleri temizle
        $content = $model->getAttribute($contentField);
        $urls = $this->extractImageUrls($content);

        foreach ($urls as $url) {
            $path = $this->extractPathFromUrl($url, $module, $disk);

            if ($path && Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->delete($path);
            }
        }

        // Library resimlerini temizle
        $this->cleanupLibraryImages($model, $disk);
    }

    /**
     * Model'in library resimlerini temizle
     *
     * @param  Model  $model  Model instance
     * @param  string  $disk  Storage disk adı
     */
    public function cleanupLibraryImages(Model $model, string $disk = 'r2'): void
    {
        $library = $model->getAttribute('library');

        if (! $library || $library->isEmpty()) {
            return;
        }

        foreach ($library as $item) {
            if (isset($item['path']) && Storage::disk($disk)->exists($item['path'])) {
                Storage::disk($disk)->delete($item['path']);
            }
        }
    }

    /**
     * Model güncellendiğinde kullanılmayan resimleri temizle
     *
     * @param  Model  $model  Model instance
     * @param  string  $module  Modül adı (blog, cms, vs.)
     * @param  array  $originalAttributes  Orijinal model attributes
     * @param  string  $contentField  Content field adı (content)
     * @param  string  $disk  Storage disk adı
     */
    public function handleModelUpdate(
        Model $model,
        string $module,
        array $originalAttributes,
        string $contentField = 'content',
        string $disk = 'r2'
    ): void {
        // Eğer content değiştiyse, kullanılmayan resimleri temizle
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
