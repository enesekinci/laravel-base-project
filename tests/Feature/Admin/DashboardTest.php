<?php

declare(strict_types=1);

use App\Livewire\Admin\Dashboard;
use App\Models\User;
use Livewire\Livewire;

it('dashboard sayfasını görüntüler', function () {
    $user = User::factory()->create(['is_admin' => true]);

    $response = test()->actingAs($user)->get(route('admin.dashboard'));

    $response->assertSuccessful();
    $response->assertSeeLivewire(Dashboard::class);
});

it('admin olmayan kullanıcı dashboard\'a erişemez', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $response = test()->actingAs($user)->get(route('admin.dashboard'));

    $response->assertForbidden();
});

it('giriş yapmamış kullanıcı dashboard\'a erişemez', function () {
    $response = test()->get(route('admin.dashboard'));

    $response->assertRedirect(route('login'));
});

it('dashboard component\'i render edilir', function () {
    $user = User::factory()->create(['is_admin' => true]);

    Livewire::actingAs($user)
        ->test(Dashboard::class)
        ->assertSuccessful()
        ->assertSee('Dashboard')
        ->assertSee('Hoş Geldiniz');
});
