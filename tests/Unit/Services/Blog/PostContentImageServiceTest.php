<?php

declare(strict_types=1);

use App\Models\Blog\Post;
use App\Services\Blog\PostContentImageService;
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

it('extractImageUrls ContentImageService\'e delegate eder', function (): void {
    $mockService = Mockery::mock(ContentImageService::class);
    $mockService->shouldReceive('extractImageUrls')
        ->once()
        ->with('test content')
        ->andReturn(['url1', 'url2']);

    $service = new PostContentImageService($mockService);

    $result = $service->extractImageUrls('test content');

    expect($result)->toBe(['url1', 'url2']);
});

it('extractPathFromUrl ContentImageService\'e blog modülü ile delegate eder', function (): void {
    $mockService = Mockery::mock(ContentImageService::class);
    $mockService->shouldReceive('extractPathFromUrl')
        ->once()
        ->with('https://test-assets.example.com/blog/editor/image.jpg', 'blog', 'r2')
        ->andReturn('blog/editor/image.jpg');

    $service = new PostContentImageService($mockService);

    $result = $service->extractPathFromUrl('https://test-assets.example.com/blog/editor/image.jpg');

    expect($result)->toBe('blog/editor/image.jpg');
});

it('cleanupUnusedImages ContentImageService\'e blog modülü ile delegate eder', function (): void {
    $post = Post::factory()->create(['content' => 'test']);

    $mockService = Mockery::mock(ContentImageService::class);
    $mockService->shouldReceive('cleanupUnusedImages')
        ->once()
        ->with($post, 'blog', 'content', 'old content');

    $service = new PostContentImageService($mockService);

    $service->cleanupUnusedImages($post, 'old content');
});

it('cleanupAllImages ContentImageService\'e blog modülü ile delegate eder', function (): void {
    $post = Post::factory()->create(['content' => 'test']);

    $mockService = Mockery::mock(ContentImageService::class);
    $mockService->shouldReceive('cleanupAllImages')
        ->once()
        ->with(Mockery::any(), 'blog', 'content');

    $service = new PostContentImageService($mockService);

    $service->cleanupAllImages($post);
});

it('cleanupLibraryImages ContentImageService\'e blog modülü ile delegate eder', function (): void {
    $post = Post::factory()->create([
        'library' => new Collection([['uuid' => 'test']]),
    ]);

    $mockService = Mockery::mock(ContentImageService::class);
    $mockService->shouldReceive('cleanupLibraryImages')
        ->once()
        ->with(Mockery::any(), 'blog');

    $service = new PostContentImageService($mockService);

    $service->cleanupLibraryImages($post);
});

it('handlePostUpdate ContentImageService\'e blog modülü ile delegate eder', function (): void {
    $post = Post::factory()->create(['content' => 'new content']);
    $originalAttributes = ['content' => 'old content'];

    $mockService = Mockery::mock(ContentImageService::class);
    $mockService->shouldReceive('handleModelUpdate')
        ->once()
        ->with(Mockery::any(), 'blog', $originalAttributes);

    $service = new PostContentImageService($mockService);

    $service->handlePostUpdate($post, $originalAttributes);
});
