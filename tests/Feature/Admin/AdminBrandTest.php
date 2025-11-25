<?php

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists brands with filters for admin', function () {
    adminUser();

    $b1 = Brand::factory()->create([
        'name' => 'Nike',
        'slug' => 'nike',
        'is_active' => true,
    ]);

    $b2 = Brand::factory()->create([
        'name' => 'Adidas',
        'slug' => 'adidas',
        'is_active' => false,
    ]);

    // basic list
    $res = $this->getJson('/api/admin/brands');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'slug', 'logo', 'is_active'],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    // search filter
    $res2 = $this->getJson('/api/admin/brands?search=nike');
    $res2->assertStatus(200);
    $ids2 = collect($res2->json('data'))->pluck('id');

    expect($ids2)->toContain($b1->id);
    expect($ids2)->not()->toContain($b2->id);

    // is_active filter
    $res3 = $this->getJson('/api/admin/brands?is_active=0');
    $res3->assertStatus(200);
    $ids3 = collect($res3->json('data'))->pluck('id');

    expect($ids3)->toContain($b2->id);
    expect($ids3)->not()->toContain($b1->id);
});

it('creates a brand', function () {
    adminUser();

    $payload = [
        'name' => 'Puma',
        'slug' => 'puma',
        'logo' => 'brands/puma.png',
        'is_active' => true,
    ];

    $res = $this->postJson('/api/admin/brands', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.name', 'Puma')
        ->assertJsonPath('data.slug', 'puma');

    $this->assertDatabaseHas('brands', [
        'name' => 'Puma',
        'slug' => 'puma',
        'logo' => 'brands/puma.png',
        'is_active' => true,
    ]);
});

it('validates brand create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/brands', [
        'name' => '',
        'slug' => '',
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'slug']);
});

it('updates a brand', function () {
    adminUser();

    $brand = Brand::factory()->create([
        'name' => 'Old Name',
        'slug' => 'old-name',
        'logo' => null,
        'is_active' => true,
    ]);

    $payload = [
        'name' => 'New Name',
        'slug' => 'new-name',
        'logo' => 'brands/new.png',
        'is_active' => false,
    ];

    $res = $this->putJson("/api/admin/brands/{$brand->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'New Name')
        ->assertJsonPath('data.slug', 'new-name')
        ->assertJsonPath('data.logo', 'brands/new.png')
        ->assertJsonPath('data.is_active', false);

    $this->assertDatabaseHas('brands', [
        'id' => $brand->id,
        'name' => 'New Name',
        'slug' => 'new-name',
        'logo' => 'brands/new.png',
        'is_active' => false,
    ]);
});

it('soft deletes and restores a brand', function () {
    adminUser();

    $brand = Brand::factory()->create();

    $res = $this->deleteJson("/api/admin/brands/{$brand->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('brands', [
        'id' => $brand->id,
    ]);

    $res2 = $this->postJson("/api/admin/brands/{$brand->id}/restore");
    $res2->assertStatus(200)
        ->assertJsonPath('data.id', $brand->id);

    $this->assertDatabaseHas('brands', [
        'id' => $brand->id,
        'deleted_at' => null,
    ]);
});

it('toggles brand active status', function () {
    adminUser();

    $brand = Brand::factory()->create([
        'is_active' => true,
    ]);

    $res = $this->postJson("/api/admin/brands/{$brand->id}/toggle-active");
    $res->assertStatus(200)
        ->assertJsonPath('data.is_active', false);

    $brand->refresh();
    expect((bool) $brand->is_active)->toBeFalse();

    $res2 = $this->postJson("/api/admin/brands/{$brand->id}/toggle-active");
    $res2->assertStatus(200)
        ->assertJsonPath('data.is_active', true);

    $brand->refresh();
    expect((bool) $brand->is_active)->toBeTrue();
});
