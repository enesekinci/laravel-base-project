<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('login yapıp dashboard\'a erişilebiliyor mu', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
        'is_admin' => true,
    ]);

    // actingAs kullanarak direkt dashboard'a git (form doldurma yerine)
    test()->actingAs($user, 'web');

    $page = visit('/admin/dashboard');
    $page->assertPathIs('/admin/dashboard');
});
