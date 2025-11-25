<?php

use App\Models\ShippingMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists shipping methods with filters', function () {
    adminUser();

    $m1 = ShippingMethod::factory()->create([
        'name' => 'Free Shipping',
        'code' => 'free_shipping',
        'type' => 'free_shipping',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $m2 = ShippingMethod::factory()->create([
        'name' => 'Flat Rate',
        'code' => 'flat_rate',
        'type' => 'flat_rate',
        'is_active' => false,
        'sort_order' => 2,
    ]);

    $res = $this->getJson('/api/admin/shipping-methods');
    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'code',
                    'type',
                    'price',
                    'min_cart_total',
                    'is_active',
                    'sort_order',
                ],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $res2 = $this->getJson('/api/admin/shipping-methods?is_active=1');
    $ids2 = collect($res2->json('data'))->pluck('id');
    expect($ids2)->toContain($m1->id);
    expect($ids2)->not()->toContain($m2->id);
});

it('creates a shipping method', function () {
    adminUser();

    $payload = [
        'name' => 'Flat Rate',
        'code' => 'flat_rate',
        'type' => 'flat_rate',
        'price' => 25,
        'min_cart_total' => 0,
        'is_active' => true,
        'sort_order' => 10,
    ];

    $res = $this->postJson('/api/admin/shipping-methods', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.code', 'flat_rate');

    $data = $res->json('data');
    expect((float) $data['price'])->toBe(25.0);

    $this->assertDatabaseHas('shipping_methods', [
        'code' => 'flat_rate',
        'price' => 25,
        'is_active' => true,
    ]);
});

it('validates shipping method create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/shipping-methods', [
        'name' => '',
        'code' => '',
        'type' => 'invalid',
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'code', 'type']);
});

it('updates a shipping method', function () {
    adminUser();

    $m = ShippingMethod::factory()->create([
        'name' => 'Flat Rate',
        'code' => 'flat_rate',
        'type' => 'flat_rate',
        'price' => 10,
        'is_active' => true,
    ]);

    $payload = [
        'name' => 'Flat Rate Updated',
        'price' => 20,
        'is_active' => false,
    ];

    $res = $this->putJson("/api/admin/shipping-methods/{$m->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'Flat Rate Updated')
        ->assertJsonPath('data.is_active', false);

    $data = $res->json('data');
    expect((float) $data['price'])->toBe(20.0);

    $this->assertDatabaseHas('shipping_methods', [
        'id' => $m->id,
        'name' => 'Flat Rate Updated',
        'price' => 20,
        'is_active' => false,
    ]);
});

it('soft deletes and restores a shipping method', function () {
    adminUser();

    $m = ShippingMethod::factory()->create();

    $res = $this->deleteJson("/api/admin/shipping-methods/{$m->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('shipping_methods', [
        'id' => $m->id,
    ]);

    $res2 = $this->postJson("/api/admin/shipping-methods/{$m->id}/restore");
    $res2->assertStatus(200)
        ->assertJsonPath('data.id', $m->id);

    $this->assertDatabaseHas('shipping_methods', [
        'id' => $m->id,
        'deleted_at' => null,
    ]);
});

it('toggles shipping method active status', function () {
    adminUser();

    $m = ShippingMethod::factory()->create([
        'is_active' => true,
    ]);

    $res = $this->postJson("/api/admin/shipping-methods/{$m->id}/toggle-active");
    $res->assertStatus(200)
        ->assertJsonPath('data.is_active', false);

    $m->refresh();
    expect($m->is_active)->toBeFalse();

    $res2 = $this->postJson("/api/admin/shipping-methods/{$m->id}/toggle-active");
    $res2->assertStatus(200)
        ->assertJsonPath('data.is_active', true);

    $m->refresh();
    expect($m->is_active)->toBeTrue();
});
