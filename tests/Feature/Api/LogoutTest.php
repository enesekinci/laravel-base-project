<?php

declare(strict_types=1);

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('logs out via sanctum endpoint', function (): void {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    test()->postJson('/api/v1/auth/logout')
        ->assertOk();
});

it('returns 401 for unauthenticated logout request', function (): void {
    test()->postJson('/api/v1/auth/logout')
        ->assertUnauthorized();
});
