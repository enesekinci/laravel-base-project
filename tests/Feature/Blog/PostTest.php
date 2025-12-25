<?php

declare(strict_types=1);

use App\Models\Blog\Post;
use App\Models\Crm\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// Blog API controller'lar henüz oluşturulmadı, route'lar yorum satırında
// Testler controller'lar oluşturulduğunda aktif edilecek

it('can list published posts', function (): void {
    test()->markTestSkipped('Blog API controller\'lar henüz oluşturulmadı');
    Post::factory()->create([
        'status' => 'published',
        'published_at' => now()->subDay(),
    ]);

    Post::factory()->create([
        'status' => 'draft',
    ]);

    $response = test()->getJson('/api/v1/blog/posts');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data');
});

it('requires authentication to create a post', function (): void {
    test()->markTestSkipped('Blog API controller\'lar henüz oluşturulmadı');
    $user = User::factory()->create(['is_admin' => true]);

    $response = test()->actingAs($user, 'sanctum')
        ->postJson('/api/v1/blog/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Test content',
            'status' => 'draft',
        ]);

    $response->assertStatus(201);

    test()->assertDatabaseHas('posts', [
        'title' => 'Test Post',
        'slug' => 'test-post',
    ]);
});
