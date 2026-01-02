<?php

declare(strict_types=1);

use App\Models\Blog\Post;
use App\Models\Cms\Page;
use App\Services\ContentImageService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    Storage::fake('r2');
    config([
        'filesystems.disks.r2' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => 'https://test-assets.example.com',
        ],
    ]);
});

it('HTML içeriğinden resim URL\'lerini çıkarır', function (): void {
    $service = new ContentImageService;

    $content = '<p>Test</p><img src="https://test-assets.example.com/blog/editor/image1.jpg" /><img src="https://test-assets.example.com/blog/editor/image2.png" />';

    $urls = $service->extractImageUrls($content);

    expect($urls)->toHaveCount(2)
        ->and($urls[0])->toBe('https://test-assets.example.com/blog/editor/image1.jpg')
        ->and($urls[1])->toBe('https://test-assets.example.com/blog/editor/image2.png');
});

it('boş içerikten resim URL\'si çıkarmaz', function (): void {
    $service = new ContentImageService;

    $urls = $service->extractImageUrls(null);
    expect($urls)->toBeEmpty();

    $urls = $service->extractImageUrls('');
    expect($urls)->toBeEmpty();
});

it('URL\'den storage path\'ini çıkarır', function (): void {
    $service = new ContentImageService;

    $url = 'https://test-assets.example.com/blog/editor/image.jpg?updated_at=123456';
    $path = $service->extractPathFromUrl($url, 'blog');

    expect($path)->toBe('blog/editor/image.jpg');
});

it('yanlış modül URL\'sinden path çıkarmaz', function (): void {
    $service = new ContentImageService;

    $url = 'https://test-assets.example.com/cms/editor/image.jpg';
    $path = $service->extractPathFromUrl($url, 'blog');

    expect($path)->toBeNull();
});

it('kullanılmayan resimleri temizler', function (): void {
    $service = new ContentImageService;

    Storage::disk('r2')->put('blog/editor/old-image.jpg', 'content');
    Storage::disk('r2')->put('blog/editor/current-image.jpg', 'content');

    $post = Post::factory()->create([
        'content' => '<img src="https://test-assets.example.com/blog/editor/current-image.jpg" />',
    ]);

    $oldContent = '<img src="https://test-assets.example.com/blog/editor/old-image.jpg" /><img src="https://test-assets.example.com/blog/editor/current-image.jpg" />';

    $service->cleanupUnusedImages($post, 'blog', 'content', $oldContent);

    expect(Storage::disk('r2')->exists('blog/editor/old-image.jpg'))->toBeFalse()
        ->and(Storage::disk('r2')->exists('blog/editor/current-image.jpg'))->toBeTrue();
});

it('model silindiğinde tüm resimleri temizler', function (): void {
    $service = new ContentImageService;

    Storage::disk('r2')->put('blog/editor/image1.jpg', 'content');
    Storage::disk('r2')->put('blog/library/image2.jpg', 'content');

    $post = Post::factory()->create([
        'content' => '<img src="https://test-assets.example.com/blog/editor/image1.jpg" />',
        'library' => new Collection([
            ['uuid' => 'test-uuid', 'path' => 'blog/library/image2.jpg', 'url' => 'https://test-assets.example.com/blog/library/image2.jpg'],
        ]),
    ]);

    $service->cleanupAllImages($post, 'blog', 'content');

    expect(Storage::disk('r2')->exists('blog/editor/image1.jpg'))->toBeFalse()
        ->and(Storage::disk('r2')->exists('blog/library/image2.jpg'))->toBeFalse();
});

it('library resimlerini temizler', function (): void {
    $service = new ContentImageService;

    Storage::disk('r2')->put('blog/library/image1.jpg', 'content');
    Storage::disk('r2')->put('cms/library/image2.jpg', 'content');

    $post = Post::factory()->create([
        'library' => new Collection([
            ['uuid' => 'test-uuid-1', 'path' => 'blog/library/image1.jpg', 'url' => 'https://test-assets.example.com/blog/library/image1.jpg'],
        ]),
    ]);

    $page = Page::create([
        'title' => 'Test Page',
        'slug' => 'test-page',
        'is_active' => true,
        'library' => new Collection([
            ['uuid' => 'test-uuid-2', 'path' => 'cms/library/image2.jpg', 'url' => 'https://test-assets.example.com/cms/library/image2.jpg'],
        ]),
    ]);

    $service->cleanupLibraryImages($post, 'blog');
    $service->cleanupLibraryImages($page, 'cms');

    expect(Storage::disk('r2')->exists('blog/library/image1.jpg'))->toBeFalse()
        ->and(Storage::disk('r2')->exists('cms/library/image2.jpg'))->toBeFalse();
});

it('yanlış modülün library resimlerini temizlemez', function (): void {
    $service = new ContentImageService;

    Storage::disk('r2')->put('cms/library/image.jpg', 'content');

    $post = Post::factory()->create([
        'library' => new Collection([
            ['uuid' => 'test-uuid', 'path' => 'cms/library/image.jpg', 'url' => 'https://test-assets.example.com/cms/library/image.jpg'],
        ]),
    ]);

    $service->cleanupLibraryImages($post, 'blog');

    expect(Storage::disk('r2')->exists('cms/library/image.jpg'))->toBeTrue();
});

it('model güncellendiğinde kullanılmayan resimleri temizler', function (): void {
    $service = new ContentImageService;

    Storage::disk('r2')->put('blog/editor/old-image.jpg', 'content');

    $post = Post::factory()->create([
        'content' => '<p>New content</p>',
    ]);

    $originalAttributes = [
        'content' => '<img src="https://test-assets.example.com/blog/editor/old-image.jpg" />',
    ];

    $service->handleModelUpdate($post, 'blog', $originalAttributes);

    expect(Storage::disk('r2')->exists('blog/editor/old-image.jpg'))->toBeFalse();
});

it('içerik değişmediyse resim temizlemez', function (): void {
    $service = new ContentImageService;

    Storage::disk('r2')->put('blog/editor/image.jpg', 'content');

    $post = Post::factory()->create([
        'content' => '<img src="https://test-assets.example.com/blog/editor/image.jpg" />',
    ]);

    $originalAttributes = [
        'content' => '<img src="https://test-assets.example.com/blog/editor/image.jpg" />',
    ];

    $service->handleModelUpdate($post, 'blog', $originalAttributes);

    expect(Storage::disk('r2')->exists('blog/editor/image.jpg'))->toBeTrue();
});
