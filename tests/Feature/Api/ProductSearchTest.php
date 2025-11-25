<?php

use App\Models\Product;

it('searches products by name', function () {
    $tshirt = Product::factory()->create([
        'name' => 'Basic T-Shirt',
        'sku' => 'TSHIRT-001',
    ]);

    $mug = Product::factory()->create([
        'name' => 'Kupa Bardak',
        'sku' => 'MUG-001',
    ]);

    $response = $this->getJson('/api/products?search=shirt');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $tshirt->id);
});

it('searches products by sku', function () {
    $product1 = Product::factory()->create([
        'name' => 'Product One',
        'sku' => 'PROD-ABC-123',
    ]);

    $product2 = Product::factory()->create([
        'name' => 'Product Two',
        'sku' => 'PROD-XYZ-456',
    ]);

    $response = $this->getJson('/api/products?search=ABC');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $product1->id);
});

it('combines search with filters', function () {
    // Ürün 1: Basic Black T-Shirt
    $product1 = Product::factory()->create([
        'name' => 'Basic Black T-Shirt',
        'sku' => 'TSHIRT-BLACK',
    ]);

    // Ürün 2: Basic White T-Shirt
    $product2 = Product::factory()->create([
        'name' => 'Basic White T-Shirt',
        'sku' => 'TSHIRT-WHITE',
    ]);

    // Ürün 3: Black Pants (shirt değil)
    $product3 = Product::factory()->create([
        'name' => 'Black Pants',
        'sku' => 'PANTS-BLACK',
    ]);

    // Renk option'ı oluştur
    $colorOption = \App\Models\Option::factory()->create(['name' => 'Renk']);
    $blackValue = \App\Models\OptionValue::factory()->create([
        'option_id' => $colorOption->id,
        'value' => 'Siyah',
    ]);

    // Ürün 1 ve 3'e siyah variant ekle
    $variant1 = \App\Models\ProductVariant::factory()->create([
        'product_id' => $product1->id,
    ]);
    $variant1->optionValues()->attach($blackValue->id, ['option_id' => $colorOption->id]);

    $variant3 = \App\Models\ProductVariant::factory()->create([
        'product_id' => $product3->id,
    ]);
    $variant3->optionValues()->attach($blackValue->id, ['option_id' => $colorOption->id]);

    // Search: shirt + Filter: color=Siyah
    $response = $this->getJson('/api/products?search=shirt&filter[color]='.$blackValue->id);

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $product1->id);
});
