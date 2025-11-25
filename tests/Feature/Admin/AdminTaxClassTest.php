<?php

use App\Models\TaxClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists tax classes with filters', function () {
    adminUser();

    $t1 = TaxClass::factory()->create([
        'name' => 'KDV 18',
        'rate' => 18,
        'is_active' => true,
    ]);

    $t2 = TaxClass::factory()->create([
        'name' => 'KDV 8',
        'rate' => 8,
        'is_active' => false,
    ]);

    $res = $this->getJson('/api/admin/tax-classes');
    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'rate', 'is_active'],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $res2 = $this->getJson('/api/admin/tax-classes?is_active=1');
    $ids2 = collect($res2->json('data'))->pluck('id');
    expect($ids2)->toContain($t1->id);
    expect($ids2)->not()->toContain($t2->id);
});

it('creates a tax class', function () {
    adminUser();

    $payload = [
        'name' => 'KDV 20',
        'rate' => 20,
        'is_active' => true,
    ];

    $res = $this->postJson('/api/admin/tax-classes', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.name', 'KDV 20');

    $data = $res->json('data');
    expect((float) $data['rate'])->toBe(20.0);

    $this->assertDatabaseHas('tax_classes', [
        'name' => 'KDV 20',
        'rate' => 20,
    ]);
});

it('validates tax class create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/tax-classes', [
        'name' => '',
        'rate' => 150,
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'rate']);
});

it('updates a tax class', function () {
    adminUser();

    $tax = TaxClass::factory()->create([
        'name' => 'KDV 18',
        'rate' => 18,
        'is_active' => true,
    ]);

    $payload = [
        'name' => 'KDV 10',
        'rate' => 10,
        'is_active' => false,
    ];

    $res = $this->putJson("/api/admin/tax-classes/{$tax->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'KDV 10')
        ->assertJsonPath('data.is_active', false);

    $data = $res->json('data');
    expect((float) $data['rate'])->toBe(10.0);

    $this->assertDatabaseHas('tax_classes', [
        'id' => $tax->id,
        'name' => 'KDV 10',
        'rate' => 10,
        'is_active' => false,
    ]);
});

it('deletes a tax class', function () {
    adminUser();

    $tax = TaxClass::factory()->create();

    $res = $this->deleteJson("/api/admin/tax-classes/{$tax->id}");
    $res->assertStatus(204);

    $this->assertDatabaseMissing('tax_classes', [
        'id' => $tax->id,
    ]);
});
