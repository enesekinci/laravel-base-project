<?php

use App\Domains\Auth\Services\AuthService;
use App\Domains\Crm\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can register a new user', function () {
    $service = new AuthService;

    $user = $service->register([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
    ]);

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->email)->toBe('test@example.com')
        ->and($user->is_admin)->toBeFalse();
});

it('can authenticate user with correct credentials', function () {
    $service = new AuthService;
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    $result = $service->login('test@example.com', 'password123');

    expect($result)->not->toBeNull()
        ->and($result)->toHaveKeys(['token', 'user'])
        ->and($result['user']->id)->toBe($user->id);
});

it('returns null for invalid credentials', function () {
    $service = new AuthService;
    User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    $result = $service->login('test@example.com', 'wrong-password');

    expect($result)->toBeNull();
});
