<?php

declare(strict_types=1);

use App\Models\FocusFlow\Todo;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('kullanıcı görev listesini alabilir', function () {
    $this->actingAs($this->user);

    Todo::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->getJson('/api/v1/todos');

    $response->assertStatus(200)
        ->assertJsonCount(3);
});

test('kullanıcı yeni görev oluşturabilir', function () {
    $this->actingAs($this->user);

    $data = [
        'title' => 'Test Görev',
        'description' => 'Test açıklama',
        'category' => 'İş',
        'priority' => 'Yüksek',
    ];

    $response = $this->postJson('/api/v1/todos', $data);

    $response->assertStatus(201)
        ->assertJsonPath('title', 'Test Görev');

    $this->assertDatabaseHas('todos', [
        'user_id' => $this->user->id,
        'title' => 'Test Görev',
    ]);
});

test('kullanıcı görev tamamlayabilir', function () {
    $this->actingAs($this->user);

    $todo = Todo::factory()->create([
        'user_id' => $this->user->id,
        'completed' => false,
    ]);

    $response = $this->postJson("/api/v1/todos/{$todo->id}/complete");

    $response->assertStatus(200)
        ->assertJsonPath('completed', true);

    $this->assertDatabaseHas('todos', [
        'id' => $todo->id,
        'completed' => true,
    ]);
});
