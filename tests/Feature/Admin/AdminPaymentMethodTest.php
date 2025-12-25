<?php

declare(strict_types=1);

use App\Models\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists payment methods with filters', function (): void {
    adminUser();

    $m1 = PaymentMethod::factory()->create([
        'name' => 'PayTR',
        'code' => 'paytr',
        'type' => 'online',
        'is_active' => true,
    ]);

    $m2 = PaymentMethod::factory()->create([
        'name' => 'Bank Transfer',
        'code' => 'bank_transfer',
        'type' => 'offline',
        'is_active' => false,
    ]);

    $res = $this->getJson('/api/admin/payment-methods');
    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'code', 'type', 'is_active', 'sort_order'],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $res2 = $this->getJson('/api/admin/payment-methods?type=offline');
    $ids2 = collect($res2->json('data'))->pluck('id');
    expect($ids2)->toContain($m2->id);
    expect($ids2)->not()->toContain($m1->id);
});

it('creates a payment method', function (): void {
    adminUser();

    $payload = [
        'name' => 'Iyzico',
        'code' => 'iyzico',
        'type' => 'online',
        'is_active' => true,
        'sort_order' => 5,
        'config' => ['api_key' => 'test'],
    ];

    $res = $this->postJson('/api/admin/payment-methods', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.code', 'iyzico')
        ->assertJsonPath('data.type', 'online')
        ->assertJsonPath('data.is_active', true);

    $this->assertDatabaseHas('payment_methods', [
        'code' => 'iyzico',
        'type' => 'online',
        'is_active' => true,
    ]);
});

it('validates payment method create payload', function (): void {
    adminUser();

    $res = $this->postJson('/api/admin/payment-methods', [
        'name' => '',
        'code' => '',
        'type' => 'invalid',
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'code', 'type']);
});

it('updates a payment method', function (): void {
    adminUser();

    $m = PaymentMethod::factory()->create([
        'name' => 'PayTR',
        'code' => 'paytr',
        'type' => 'online',
        'is_active' => true,
    ]);

    $payload = [
        'name' => 'PayTR Updated',
        'is_active' => false,
    ];

    $res = $this->putJson("/api/admin/payment-methods/{$m->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'PayTR Updated')
        ->assertJsonPath('data.is_active', false);

    $this->assertDatabaseHas('payment_methods', [
        'id' => $m->id,
        'name' => 'PayTR Updated',
        'is_active' => false,
    ]);
});

it('soft deletes and restores a payment method', function (): void {
    adminUser();

    $m = PaymentMethod::factory()->create();

    $res = $this->deleteJson("/api/admin/payment-methods/{$m->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('payment_methods', [
        'id' => $m->id,
    ]);

    $res2 = $this->postJson("/api/admin/payment-methods/{$m->id}/restore");
    $res2->assertStatus(200)
        ->assertJsonPath('data.id', $m->id);

    $this->assertDatabaseHas('payment_methods', [
        'id' => $m->id,
        'deleted_at' => null,
    ]);
});

it('toggles payment method active status', function (): void {
    adminUser();

    $m = PaymentMethod::factory()->create([
        'is_active' => true,
    ]);

    $res = $this->postJson("/api/admin/payment-methods/{$m->id}/toggle-active");
    $res->assertStatus(200)
        ->assertJsonPath('data.is_active', false);

    $m->refresh();
    expect($m->is_active)->toBeFalse();

    $res2 = $this->postJson("/api/admin/payment-methods/{$m->id}/toggle-active");
    $res2->assertStatus(200)
        ->assertJsonPath('data.is_active', true);

    $m->refresh();
    expect($m->is_active)->toBeTrue();
});
