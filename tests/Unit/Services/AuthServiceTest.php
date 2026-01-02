<?php

declare(strict_types=1);

use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can register a new user', function (): void {
    $service = new AuthService;

    $email = fake()->unique()->safeEmail();
    $user = $service->register([
        'name' => 'Test User',
        'email' => $email,
        'password' => 'password123',
    ]);

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->email)->toBe($email)
        ->and($user->is_admin)->toBeFalse();
});

it('can authenticate user with correct credentials', function (): void {
    $service = new AuthService;
    $email = fake()->unique()->safeEmail();
    $user = User::factory()->create([
        'email' => $email,
        'password' => bcrypt('password123'),
    ]);

    $result = $service->login($email, 'password123');

    expect($result)->not->toBeNull()
        ->and($result)->toBeInstanceOf(User::class)
        ->and($result->id)->toBe($user->id)
        ->and($result->email)->toBe($email);
});

it('returns null for invalid credentials', function (): void {
    $service = new AuthService;
    $email = fake()->unique()->safeEmail();
    User::factory()->create([
        'email' => $email,
        'password' => bcrypt('password123'),
    ]);

    $result = $service->login($email, 'wrong-password');

    expect($result)->toBeNull();
});
