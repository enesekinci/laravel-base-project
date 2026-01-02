<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can register a new user via API', function (): void {
    $email = fake()->unique()->safeEmail();
    $response = test()->postJson('/api/v1/auth/register', [
        'name' => 'Test User',
        'email' => $email,
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'token',
            'user' => [
                'id',
                'name',
                'email',
            ],
        ]);

    test()->assertDatabaseHas('users', [
        'email' => $email,
    ]);
});

it('can login via API', function (): void {
    $email = fake()->unique()->safeEmail();
    $user = User::factory()->create([
        'email' => $email,
        'password' => bcrypt('password123'),
    ]);

    $response = test()->postJson('/api/v1/auth/login', [
        'email' => $email,
        'password' => 'password123',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'token',
            'user',
        ]);
});

it('can get authenticated user via API', function (): void {
    $user = User::factory()->create();

    $response = test()->actingAs($user, 'sanctum')
        ->getJson('/api/v1/auth/me');

    $response->assertStatus(200)
        ->assertJson([
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
            ],
        ]);
});

it('can logout via API', function (): void {
    $user = User::factory()->create();

    $response = test()->actingAs($user, 'sanctum')
        ->postJson('/api/v1/auth/logout');

    $response->assertStatus(200)
        ->assertJson(['message' => 'Logged out']);
});
