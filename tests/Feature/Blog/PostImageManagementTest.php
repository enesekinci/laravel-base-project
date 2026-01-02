<?php

declare(strict_types=1);

use App\Models\Blog\Post;
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

it('post silindiğinde editör resimleri temizlenir', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('blog/editor/image.jpg', 'test content');

    $post = Post::factory()->create([
        'author_id' => $admin->id,
        'content' => '<img src="https://test-assets.example.com/blog/editor/image.jpg" />',
    ]);

    $post->delete();

    expect(Storage::disk('r2')->exists('blog/editor/image.jpg'))->toBeFalse();
});

it('post silindiğinde library resimleri temizlenir', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('blog/library/cover.jpg', 'test content');

    $post = Post::factory()->create([
        'author_id' => $admin->id,
        'library' => new Collection([
            ['uuid' => 'test-uuid', 'path' => 'blog/library/cover.jpg', 'url' => 'https://test-assets.example.com/blog/library/cover.jpg'],
        ]),
    ]);

    $post->delete();

    expect(Storage::disk('r2')->exists('blog/library/cover.jpg'))->toBeFalse();
});

it('post güncellendiğinde kullanılmayan editör resimleri temizlenir', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('blog/editor/old-image.jpg', 'test content');
    Storage::disk('r2')->put('blog/editor/new-image.jpg', 'test content');

    // Önce eski içerikle oluştur
    $post = Post::factory()->create([
        'author_id' => $admin->id,
        'content' => '<img src="https://test-assets.example.com/blog/editor/old-image.jpg" /><img src="https://test-assets.example.com/blog/editor/new-image.jpg" />',
    ]);

    // Sonra yeni içerikle güncelle
    $post->content = '<img src="https://test-assets.example.com/blog/editor/new-image.jpg" />';
    $post->save();

    expect(Storage::disk('r2')->exists('blog/editor/old-image.jpg'))->toBeFalse()
        ->and(Storage::disk('r2')->exists('blog/editor/new-image.jpg'))->toBeTrue();
});

// Not: Library güncelleme işlemi syncMedia metodu ile yapılıyor, model event'leri ile değil
// Bu yüzden library güncelleme testi syncMedia testlerinde kapsanıyor

it('editor içeriğinden resim URL\'leri çıkarılır', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    $content = '<p>Test</p><img src="https://test-assets.example.com/blog/editor/image1.jpg" alt="Image 1" /><img src="https://test-assets.example.com/blog/editor/image2.png" />';

    $post = Post::factory()->create([
        'author_id' => $admin->id,
        'content' => $content,
    ]);

    $service = app(\App\Services\Blog\PostContentImageService::class);
    $urls = $service->extractImageUrls($content);

    expect($urls)->toHaveCount(2)
        ->and($urls[0])->toBe('https://test-assets.example.com/blog/editor/image1.jpg')
        ->and($urls[1])->toBe('https://test-assets.example.com/blog/editor/image2.png');
});

it('yanlış modülün resimlerini temizlemez', function (): void {
    $admin = User::factory()->create(['is_admin' => true]);

    Storage::disk('r2')->put('cms/editor/other-image.jpg', 'test content');

    $post = Post::factory()->create([
        'author_id' => $admin->id,
        'content' => '<img src="https://test-assets.example.com/cms/editor/other-image.jpg" />',
    ]);

    $post->delete();

    // CMS modülünün resmi temizlenmemeli
    expect(Storage::disk('r2')->exists('cms/editor/other-image.jpg'))->toBeTrue();
});
