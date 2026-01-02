<?php

declare(strict_types=1);

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('returns current user for sanctum auth', function (): void {
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    test()->getJson('/api/v1/auth/me')
        ->assertOk()
        ->assertJsonPath('user.id', $user->id);
});

it('returns 401 for unauthenticated request', function (): void {
    test()->getJson('/api/v1/auth/me')
        ->assertUnauthorized();
});
