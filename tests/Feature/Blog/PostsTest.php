<?php

declare(strict_types=1);

use App\Livewire\Blog\Admin\PostForm;
use App\Livewire\Blog\Admin\PostsIndex;
use App\Models\Blog\Post;
use App\Models\User;
use Livewire\Livewire;

it('yazı listesini görüntüler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    Post::create(['title' => 'Yazı 1', 'slug' => 'yazi-1', 'status' => 'draft', 'author_id' => $admin->id]);
    Post::create(['title' => 'Yazı 2', 'slug' => 'yazi-2', 'status' => 'published', 'author_id' => $admin->id]);

    Livewire::actingAs($admin)
        ->test(PostsIndex::class)
        ->assertSuccessful()
        ->assertSee('Yazı Yönetimi')
        ->assertSee('Yeni Yazı');
});

it('yeni yazı oluşturur', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Livewire::actingAs($admin)
        ->test(PostForm::class)
        ->set('title', 'Yeni Yazı')
        ->set('slug', 'yeni-yazi')
        ->set('content', 'Yazı içeriği')
        ->set('status', 'draft')
        ->call('save')
        ->assertRedirect(route('admin.blog.posts.index'));

    test()->assertDatabaseHas('posts', [
        'title' => 'Yeni Yazı',
        'slug' => 'yeni-yazi',
    ]);
});

it('yazı düzenler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $post = Post::create(['title' => 'Eski Başlık', 'slug' => 'eski-baslik', 'status' => 'draft', 'author_id' => $admin->id]);

    Livewire::actingAs($admin)
        ->test(PostForm::class, ['id' => $post->id])
        ->assertSet('title', 'Eski Başlık')
        ->set('title', 'Yeni Başlık')
        ->set('slug', $post->slug)
        ->call('save')
        ->assertRedirect(route('admin.blog.posts.index'));

    test()->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Yeni Başlık',
    ]);
});

it('yazı siler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $post = Post::create(['title' => 'Silinecek Yazı', 'slug' => 'silinecek-yazi', 'status' => 'draft', 'author_id' => $admin->id]);

    Livewire::actingAs($admin)
        ->test(PostsIndex::class)
        ->call('delete', $post->id)
        ->assertDispatched('toast');

    test()->assertSoftDeleted('posts', ['id' => $post->id]);
});

it('admin olmayan kullanıcı erişemez', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = test()->actingAs($user)->get(route('admin.blog.posts.index'));

    $response->assertForbidden();
});
