<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists categories with filters for admin', function () {
    adminUser();

    $root1 = Category::factory()->create([
        'name' => 'Clothing',
        'slug' => 'clothing',
        'parent_id' => null,
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $root2 = Category::factory()->create([
        'name' => 'Shoes',
        'slug' => 'shoes',
        'parent_id' => null,
        'is_active' => false,
        'sort_order' => 2,
    ]);

    $child1 = Category::factory()->create([
        'name' => 'T-Shirts',
        'slug' => 't-shirts',
        'parent_id' => $root1->id,
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $child2 = Category::factory()->create([
        'name' => 'Sneakers',
        'slug' => 'sneakers',
        'parent_id' => $root2->id,
        'is_active' => true,
        'sort_order' => 1,
    ]);

    // basic list
    $res = $this->getJson('/api/admin/categories');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'slug', 'parent_id', 'is_active', 'sort_order'],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    // search filter
    $res2 = $this->getJson('/api/admin/categories?search=shirt');
    $res2->assertStatus(200);
    $ids2 = collect($res2->json('data'))->pluck('id');

    expect($ids2)->toContain($child1->id);
    expect($ids2)->not()->toContain($root2->id);

    // parent filter
    $res3 = $this->getJson('/api/admin/categories?parent_id='.$root1->id);
    $res3->assertStatus(200);
    $ids3 = collect($res3->json('data'))->pluck('id');

    expect($ids3)->toContain($child1->id);
    expect($ids3)->not()->toContain($child2->id);

    // is_active filter
    $res4 = $this->getJson('/api/admin/categories?is_active=0');
    $res4->assertStatus(200);
    $ids4 = collect($res4->json('data'))->pluck('id');

    expect($ids4)->toContain($root2->id);
    expect($ids4)->not()->toContain($root1->id);
});

it('returns category tree for admin', function () {
    adminUser();

    $root = Category::factory()->create([
        'name' => 'Clothing',
        'slug' => 'clothing',
        'parent_id' => null,
        'sort_order' => 1,
    ]);

    $child1 = Category::factory()->create([
        'name' => 'T-Shirts',
        'slug' => 't-shirts',
        'parent_id' => $root->id,
        'sort_order' => 1,
    ]);

    $child2 = Category::factory()->create([
        'name' => 'Jeans',
        'slug' => 'jeans',
        'parent_id' => $root->id,
        'sort_order' => 2,
    ]);

    $grandChild = Category::factory()->create([
        'name' => 'Skinny Jeans',
        'slug' => 'skinny-jeans',
        'parent_id' => $child2->id,
        'sort_order' => 1,
    ]);

    $res = $this->getJson('/api/admin/categories/tree');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'slug',
                    'children' => [
                        '*' => [
                            'id',
                            'name',
                            'slug',
                            'children',
                        ],
                    ],
                ],
            ],
        ]);

    $tree = $res->json('data');
    $rootNode = collect($tree)->firstWhere('id', $root->id);
    expect($rootNode)->not()->toBeNull();

    $childIds = collect($rootNode['children'])->pluck('id');
    expect($childIds)->toContain($child1->id);
    expect($childIds)->toContain($child2->id);

    $jeansNode = collect($rootNode['children'])->firstWhere('id', $child2->id);
    $grandIds = collect($jeansNode['children'])->pluck('id');
    expect($grandIds)->toContain($grandChild->id);
});

it('creates a category', function () {
    adminUser();

    $parent = Category::factory()->create();

    $payload = [
        'name' => 'New Category',
        'slug' => 'new-category',
        'parent_id' => $parent->id,
        'description' => 'Desc',
        'sort_order' => 5,
        'is_active' => true,
    ];

    $res = $this->postJson('/api/admin/categories', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.name', 'New Category')
        ->assertJsonPath('data.parent_id', $parent->id);

    $this->assertDatabaseHas('categories', [
        'name' => 'New Category',
        'slug' => 'new-category',
        'parent_id' => $parent->id,
        'sort_order' => 5,
        'is_active' => true,
    ]);
});

it('validates category create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/categories', [
        'name' => '',
        'slug' => '',
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'slug']);
});

it('updates a category', function () {
    adminUser();

    $parent1 = Category::factory()->create();
    $parent2 = Category::factory()->create();

    $category = Category::factory()->create([
        'name' => 'Old Name',
        'slug' => 'old-name',
        'parent_id' => $parent1->id,
        'sort_order' => 1,
        'is_active' => true,
    ]);

    $payload = [
        'name' => 'Updated Name',
        'slug' => 'updated-name',
        'parent_id' => $parent2->id,
        'sort_order' => 10,
        'is_active' => false,
    ];

    $res = $this->putJson("/api/admin/categories/{$category->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'Updated Name')
        ->assertJsonPath('data.parent_id', $parent2->id)
        ->assertJsonPath('data.is_active', false)
        ->assertJsonPath('data.sort_order', 10);

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Updated Name',
        'slug' => 'updated-name',
        'parent_id' => $parent2->id,
        'sort_order' => 10,
        'is_active' => false,
    ]);
});

it('soft deletes and restores a category', function () {
    adminUser();

    $category = Category::factory()->create();

    $res = $this->deleteJson("/api/admin/categories/{$category->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('categories', [
        'id' => $category->id,
    ]);

    $res2 = $this->postJson("/api/admin/categories/{$category->id}/restore");
    $res2->assertStatus(200)
        ->assertJsonPath('data.id', $category->id);

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'deleted_at' => null,
    ]);
});

it('toggles category active status', function () {
    adminUser();

    $category = Category::factory()->create([
        'is_active' => true,
    ]);

    $res = $this->postJson("/api/admin/categories/{$category->id}/toggle-active");
    $res->assertStatus(200)
        ->assertJsonPath('data.is_active', false);

    $category->refresh();
    expect((bool) $category->is_active)->toBeFalse();

    $res2 = $this->postJson("/api/admin/categories/{$category->id}/toggle-active");
    $res2->assertStatus(200)
        ->assertJsonPath('data.is_active', true);

    $category->refresh();
    expect((bool) $category->is_active)->toBeTrue();
});
