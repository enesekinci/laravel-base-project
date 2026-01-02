<?php

declare(strict_types=1);

use App\Livewire\Cms\Admin\PageForm;
use App\Livewire\Cms\Admin\PagesIndex;
use App\Models\Cms\Page;
use App\Models\User;
use Livewire\Livewire;

it('sayfa listesini görüntüler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    Page::create(['title' => 'Sayfa 1', 'slug' => 'sayfa-1', 'is_active' => true]);
    Page::create(['title' => 'Sayfa 2', 'slug' => 'sayfa-2', 'is_active' => true]);

    Livewire::actingAs($admin)
        ->test(PagesIndex::class)
        ->assertSuccessful()
        ->assertSee('Sayfa Yönetimi')
        ->assertSee('Yeni Sayfa');
});

it('sayfa arama yapar', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $page = Page::create(['title' => 'Test Sayfa', 'slug' => 'test-sayfa', 'is_active' => true]);

    Livewire::actingAs($admin)
        ->test(PagesIndex::class)
        ->set('search', 'Test')
        ->assertSee('Test Sayfa')
        ->assertSee($page->slug);
});

it('yeni sayfa oluşturur', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    Livewire::actingAs($admin)
        ->test(PageForm::class)
        ->set('title', 'Yeni Sayfa')
        ->set('slug', 'yeni-sayfa')
        ->set('content', 'Sayfa içeriği')
        ->call('save')
        ->assertRedirect(route('admin.cms.pages.index'));

    test()->assertDatabaseHas('pages', [
        'title' => 'Yeni Sayfa',
        'slug' => 'yeni-sayfa',
    ]);
});

it('sayfa düzenler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $page = Page::create(['title' => 'Eski Başlık', 'slug' => 'eski-baslik', 'is_active' => true]);

    Livewire::actingAs($admin)
        ->test(PageForm::class, ['id' => $page->id])
        ->assertSet('title', 'Eski Başlık')
        ->set('title', 'Yeni Başlık')
        ->set('slug', $page->slug)
        ->call('save')
        ->assertRedirect(route('admin.cms.pages.index'));

    test()->assertDatabaseHas('pages', [
        'id' => $page->id,
        'title' => 'Yeni Başlık',
    ]);
});

it('sayfa siler', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $page = Page::create(['title' => 'Silinecek Sayfa', 'slug' => 'silinecek-sayfa', 'is_active' => true]);

    Livewire::actingAs($admin)
        ->test(PagesIndex::class)
        ->call('delete', $page->id)
        ->assertDispatched('toast');

    test()->assertSoftDeleted('pages', ['id' => $page->id]);
});

it('admin olmayan kullanıcı erişemez', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = test()->actingAs($user)->get(route('admin.cms.pages.index'));

    $response->assertForbidden();
});
