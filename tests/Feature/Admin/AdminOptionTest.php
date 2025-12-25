<?php

declare(strict_types=1);

use App\Models\Option;
use App\Models\OptionValue;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists options with their values for admin', function (): void {
    adminUser();

    $color = Option::factory()->create([
        'name' => 'Color',
        'type' => 'select',
    ]);

    $size = Option::factory()->create([
        'name' => 'Size',
        'type' => 'select',
    ]);

    $red = OptionValue::factory()->create([
        'option_id' => $color->id,
        'value' => 'Red',
        'sort_order' => 1,
    ]);

    $blue = OptionValue::factory()->create([
        'option_id' => $color->id,
        'value' => 'Blue',
        'sort_order' => 2,
    ]);

    $small = OptionValue::factory()->create([
        'option_id' => $size->id,
        'value' => 'S',
        'sort_order' => 1,
    ]);

    $res = $this->getJson('/api/admin/options');

    $res->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'type',
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

    $colorRow = collect($data)->firstWhere('id', $color->id);
    expect($colorRow)->not()->toBeNull();
    $colorValues = collect($colorRow['values'])->pluck('value');
    expect($colorValues)->toContain('Red');
    expect($colorValues)->toContain('Blue');

    $sizeRow = collect($data)->firstWhere('id', $size->id);
    $sizeValues = collect($sizeRow['values'])->pluck('value');
    expect($sizeValues)->toContain('S');
});

it('shows a single option with values', function (): void {
    adminUser();

    $option = Option::factory()->create([
        'name' => 'Color',
        'type' => 'select',
    ]);

    $red = OptionValue::factory()->create([
        'option_id' => $option->id,
        'value' => 'Red',
        'sort_order' => 1,
    ]);

    $res = $this->getJson("/api/admin/options/{$option->id}");

    $res->assertStatus(200)
        ->assertJsonPath('data.id', $option->id)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'type',
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
    expect($values)->toContain('Red');
});

it('creates an option with values', function (): void {
    adminUser();

    $payload = [
        'name' => 'Color',
        'type' => 'select',
        'values' => [
            ['value' => 'Red',  'sort_order' => 1],
            ['value' => 'Blue', 'sort_order' => 2],
        ],
    ];

    $res = $this->postJson('/api/admin/options', $payload);

    $res->assertStatus(201)
        ->assertJsonPath('data.name', 'Color');

    $optionId = $res->json('data.id');

    $this->assertDatabaseHas('options', [
        'id' => $optionId,
        'name' => 'Color',
        'type' => 'select',
    ]);

    $this->assertDatabaseHas('option_values', [
        'option_id' => $optionId,
        'value' => 'Red',
    ]);

    $this->assertDatabaseHas('option_values', [
        'option_id' => $optionId,
        'value' => 'Blue',
    ]);
});

it('validates option create payload', function (): void {
    adminUser();

    $res = $this->postJson('/api/admin/options', [
        'name' => '',
        'type' => 'invalid',
    ]);

    $res->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'type']);
});

it('updates an option and syncs its values', function (): void {
    adminUser();

    $option = Option::factory()->create([
        'name' => 'Color',
        'type' => 'select',
    ]);

    $red = OptionValue::factory()->create([
        'option_id' => $option->id,
        'value' => 'Red',
        'sort_order' => 1,
    ]);

    $blue = OptionValue::factory()->create([
        'option_id' => $option->id,
        'value' => 'Blue',
        'sort_order' => 2,
    ]);

    $payload = [
        'name' => 'Color Updated',
        'type' => 'select',
        'values' => [
            [
                'id' => $red->id,
                'value' => 'Red Updated',
                'sort_order' => 10,
            ],
            [
                'value' => 'Green',
                'sort_order' => 30,
            ],
        ],
    ];

    $res = $this->putJson("/api/admin/options/{$option->id}", $payload);

    $res->assertStatus(200)
        ->assertJsonPath('data.name', 'Color Updated');

    // Red updated
    $this->assertDatabaseHas('option_values', [
        'id' => $red->id,
        'option_id' => $option->id,
        'value' => 'Red Updated',
        'sort_order' => 10,
    ]);

    // Blue silinmiş olmalı
    $this->assertDatabaseMissing('option_values', [
        'id' => $blue->id,
        'option_id' => $option->id,
    ]);

    // Green eklenmiş olmalı
    $this->assertDatabaseHas('option_values', [
        'option_id' => $option->id,
        'value' => 'Green',
        'sort_order' => 30,
    ]);
});

it('soft deletes an option', function (): void {
    adminUser();

    $option = Option::factory()->create();

    $res = $this->deleteJson("/api/admin/options/{$option->id}");

    $res->assertStatus(204);

    $this->assertSoftDeleted('options', [
        'id' => $option->id,
    ]);
});
