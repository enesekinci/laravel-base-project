<?php

declare(strict_types=1);

use App\Domains\Blog\Models\Post;
use App\Domains\Crm\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can list published posts', function (): void {
    Post::factory()->create([
        'status' => 'published',
        'published_at' => now()->subDay(),
    ]);

    Post::factory()->create([
        'status' => 'draft',
    ]);

    $response = $this->getJson('/api/v1/blog/posts');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data');
});

it('requires authentication to create a post', function (): void {
    $user = User::factory()->create(['is_admin' => true]);

    $response = $this->actingAs($user, 'sanctum')
        ->postJson('/api/v1/blog/posts', [
            'title' => 'Test Post',
            'slug' => 'test-post',
            'content' => 'Test content',
            'status' => 'draft',
        ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas('posts', [
        'title' => 'Test Post',
        'slug' => 'test-post',
    ]);
});
