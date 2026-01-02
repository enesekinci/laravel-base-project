<?php

declare(strict_types=1);

use App\Models\Cms\Page;
use App\Models\User;
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

it('page silindiğinde editör resimleri temizlenir', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('cms/editor/image.jpg', 'test content');

    $page = Page::create([
        'title' => 'Test Page',
        'slug' => 'test-page',
        'is_active' => true,
        'content' => '<img src="https://test-assets.example.com/cms/editor/image.jpg" />',
    ]);

    $page->delete();

    expect(Storage::disk('r2')->exists('cms/editor/image.jpg'))->toBeFalse();
});

it('page silindiğinde library resimleri temizlenir', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('cms/library/cover.jpg', 'test content');

    $page = Page::create([
        'title' => 'Test Page',
        'slug' => 'test-page',
        'is_active' => true,
        'library' => new Collection([
            ['uuid' => 'test-uuid', 'path' => 'cms/library/cover.jpg', 'url' => 'https://test-assets.example.com/cms/library/cover.jpg'],
        ]),
    ]);

    $page->delete();

    expect(Storage::disk('r2')->exists('cms/library/cover.jpg'))->toBeFalse();
});

it('page güncellendiğinde kullanılmayan editör resimleri temizlenir', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('cms/editor/old-image.jpg', 'test content');
    Storage::disk('r2')->put('cms/editor/new-image.jpg', 'test content');

    // Önce eski içerikle oluştur
    $page = Page::create([
        'title' => 'Test Page',
        'slug' => 'test-page',
        'is_active' => true,
        'content' => '<img src="https://test-assets.example.com/cms/editor/old-image.jpg" /><img src="https://test-assets.example.com/cms/editor/new-image.jpg" />',
    ]);

    // Sonra yeni içerikle güncelle
    $page->content = '<img src="https://test-assets.example.com/cms/editor/new-image.jpg" />';
    $page->save();

    expect(Storage::disk('r2')->exists('cms/editor/old-image.jpg'))->toBeFalse()
        ->and(Storage::disk('r2')->exists('cms/editor/new-image.jpg'))->toBeTrue();
});

// Not: Library güncelleme işlemi syncMedia metodu ile yapılıyor, model event'leri ile değil
// Bu yüzden library güncelleme testi syncMedia testlerinde kapsanıyor

it('editor içeriğinden resim URL\'leri çıkarılır', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $content = '<p>Test</p><img src="https://test-assets.example.com/cms/editor/image1.jpg" alt="Image 1" /><img src="https://test-assets.example.com/cms/editor/image2.png" />';

    $page = Page::create([
        'title' => 'Test Page',
        'slug' => 'test-page',
        'is_active' => true,
        'content' => $content,
    ]);

    $service = app(\App\Services\ContentImageService::class);
    $urls = $service->extractImageUrls($content);

    expect($urls)->toHaveCount(2)
        ->and($urls[0])->toBe('https://test-assets.example.com/cms/editor/image1.jpg')
        ->and($urls[1])->toBe('https://test-assets.example.com/cms/editor/image2.png');
});

it('yanlış modülün resimlerini temizlemez', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('blog/editor/other-image.jpg', 'test content');

    $page = Page::create([
        'title' => 'Test Page',
        'slug' => 'test-page',
        'is_active' => true,
        'content' => '<img src="https://test-assets.example.com/blog/editor/other-image.jpg" />',
    ]);

    $page->delete();

    // Blog modülünün resmi temizlenmemeli
    expect(Storage::disk('r2')->exists('blog/editor/other-image.jpg'))->toBeTrue();
});
