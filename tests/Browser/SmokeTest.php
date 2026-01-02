<?php

declare(strict_types=1);

use App\Models\User;

it('public pages load', function (): void {
    $page = visit('/');
    $page->assertSee('Laravel');

    $page = visit('/login');
    $page->assertSee('Giriş');
});

it('admin dashboard requires auth', function (): void {
    $page = visit('/admin/dashboard');
    $page->assertPathIs('/login');
});

it('admin dashboard loads for admin', function (): void {
    $admin = User::factory()->admin()->create();

    test()->actingAs($admin, 'web');

    $page = visit('/admin/dashboard');
    $page->assertPathIs('/admin/dashboard')
        ->assertSee('Dashboard');
});
