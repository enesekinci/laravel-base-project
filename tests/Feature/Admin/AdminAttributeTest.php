<?php

use App\Models\Attribute;
use App\Models\AttributeSet;
use App\Models\AttributeValue;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists attributes with values for admin', function () {
    adminUser();

    $set = AttributeSet::factory()->create();

    $attr1 = Attribute::factory()->create([
        'attribute_set_id' => $set->id,
        'name' => 'Material',
        'slug' => 'material',
        'type' => 'select',
        'is_filterable' => true,
    ]);

    $attr2 = Attribute::factory()->create([
        'attribute_set_id' => null,
        'name' => 'Neck Type',
        'slug' => 'neck-type',
        'type' => 'select',
        'is_filterable' => false,
    ]);

    $cotton = AttributeValue::factory()->create([
        'attribute_id' => $attr1->id,
        'value' => 'Cotton',
        'sort_order' => 1,
    ]);

    $poly = AttributeValue::factory()->create([
        'attribute_id' => $attr1->id,
        'value' => 'Polyester',
        'sort_order' => 2,
    ]);

    $res = $this->getJson('/api/admin/attributes');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'slug',
                    'type',
                    'is_filterable',
                    'attribute_set' => [
                        'id',
                        'name',
                    ],
                    'values' => [
                        '*' => [
                            'id',
                            'value',
                            'sort_order',
                        ],
                    ],
                ],
            ],
            'meta' => ['current_page', 'per_page', 'total'],
        ]);

    $data = $res->json('data');

    $materialRow = collect($data)->firstWhere('id', $attr1->id);
    expect($materialRow)->not()->toBeNull();
    $vals = collect($materialRow['values'])->pluck('value');
    expect($vals)->toContain('Cotton');
    expect($vals)->toContain('Polyester');
});

it('shows a single attribute with values', function () {
    adminUser();

    $attr = Attribute::factory()->create([
        'name' => 'Material',
        'slug' => 'material',
        'type' => 'select',
        'is_filterable' => true,
    ]);

    $val = AttributeValue::factory()->create([
        'attribute_id' => $attr->id,
        'value' => 'Cotton',
        'sort_order' => 1,
    ]);

    $res = $this->getJson("/api/admin/attributes/{$attr->id}");

    $res->assertStatus(200)
        ->assertJsonPath('data.id', $attr->id)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'slug',
                'type',
                'is_filterable',
                'attribute_set',
                'values' => [
                    '*' => [
                        'id',
                        'value',
                        'sort_order',
                    ],
                ],
            ],
        ]);

    $values = collect($res->json('data.values'))->pluck('value');
    expect($values)->toContain('Cotton');
});

it('creates an attribute with values', function () {
    adminUser();

    $set = AttributeSet::factory()->create();

    $payload = [
        'attribute_set_id' => $set->id,
        'name' => 'Material',
        'slug' => 'material',
        'type' => 'select',
        'is_filterable' => true,
        'values' => [
            ['value' => 'Cotton',    'sort_order' => 1],
            ['value' => 'Polyester', 'sort_order' => 2],
        ],
    ];

    $res = $this->postJson('/api/admin/attributes', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.name', 'Material')
        ->assertJsonPath('data.attribute_set.id', $set->id);

    $attrId = $res->json('data.id');

    $this->assertDatabaseHas('attributes', [
        'id' => $attrId,
        'attribute_set_id' => $set->id,
        'name' => 'Material',
        'slug' => 'material',
        'type' => 'select',
        'is_filterable' => true,
    ]);

    $this->assertDatabaseHas('attribute_values', [
        'attribute_id' => $attrId,
        'value' => 'Cotton',
    ]);

    $this->assertDatabaseHas('attribute_values', [
        'attribute_id' => $attrId,
        'value' => 'Polyester',
    ]);
});

it('validates attribute create payload', function () {
    adminUser();

    $res = $this->postJson('/api/admin/attributes', [
        'name' => '',
        'slug' => '',
        'type' => 'invalid',
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'slug', 'type']);
});

it('updates an attribute and syncs values', function () {
    adminUser();

    $set1 = AttributeSet::factory()->create();
    $set2 = AttributeSet::factory()->create();

    $attr = Attribute::factory()->create([
        'attribute_set_id' => $set1->id,
        'name' => 'Material',
        'slug' => 'material',
        'type' => 'select',
        'is_filterable' => true,
    ]);

    $cotton = AttributeValue::factory()->create([
        'attribute_id' => $attr->id,
        'value' => 'Cotton',
        'sort_order' => 1,
    ]);

    $poly = AttributeValue::factory()->create([
        'attribute_id' => $attr->id,
        'value' => 'Polyester',
        'sort_order' => 2,
    ]);

    $payload = [
        'attribute_set_id' => $set2->id,
        'name' => 'Material Updated',
        'slug' => 'material-updated',
        'type' => 'select',
        'is_filterable' => false,
        'values' => [
            [
                'id' => $cotton->id,
                'value' => 'Cotton Updated',
                'sort_order' => 10,
            ],
            [
                'value' => 'Linen',
                'sort_order' => 30,
            ],
        ],
    ];

    $res = $this->putJson("/api/admin/attributes/{$attr->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'Material Updated')
        ->assertJsonPath('data.attribute_set.id', $set2->id)
        ->assertJsonPath('data.is_filterable', false);

    $this->assertDatabaseHas('attributes', [
        'id' => $attr->id,
        'attribute_set_id' => $set2->id,
        'name' => 'Material Updated',
        'slug' => 'material-updated',
        'is_filterable' => false,
    ]);

    // Cotton updated
    $this->assertDatabaseHas('attribute_values', [
        'id' => $cotton->id,
        'attribute_id' => $attr->id,
        'value' => 'Cotton Updated',
        'sort_order' => 10,
    ]);

    // Polyester silinmiş olmalı
    $this->assertDatabaseMissing('attribute_values', [
        'id' => $poly->id,
        'attribute_id' => $attr->id,
    ]);

    // Linen eklenmiş olmalı
    $this->assertDatabaseHas('attribute_values', [
        'attribute_id' => $attr->id,
        'value' => 'Linen',
        'sort_order' => 30,
    ]);
});

it('soft deletes an attribute', function () {
    adminUser();

    $attr = Attribute::factory()->create();

    $res = $this->deleteJson("/api/admin/attributes/{$attr->id}");
    $res->assertStatus(204);

    $this->assertSoftDeleted('attributes', [
        'id' => $attr->id,
    ]);
});
