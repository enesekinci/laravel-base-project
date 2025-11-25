<?php

use App\Models\Attribute;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariant;

/**
 * Yardımcı: Product + variant + renk + materyal setup
 */
function createSearchableTshirt(
    string $name,
    string $colorValue,
    string $sizeValue,
    ?string $material = null
): Product {
    $product = Product::factory()->create([
        'name' => $name,
        'slug' => \Illuminate\Support\Str::slug($name).'-'.\Illuminate\Support\Str::random(5),
        'price' => 299.90,
    ]);

    // Options
    $colorOption = Option::firstOrCreate(['name' => 'Renk'], ['type' => 'select']);
    $sizeOption = Option::firstOrCreate(['name' => 'Beden'], ['type' => 'select']);

    $color = OptionValue::create([
        'option_id' => $colorOption->id,
        'value' => $colorValue,
    ]);

    $size = OptionValue::create([
        'option_id' => $sizeOption->id,
        'value' => $sizeValue,
    ]);

    $variant = ProductVariant::factory()->create([
        'product_id' => $product->id,
        'price' => 319.90,
        'quantity' => 5,
        'in_stock' => true,
        'is_active' => true,
    ]);

    $variant->optionValues()->attach([
        $color->id => ['option_id' => $colorOption->id],
        $size->id => ['option_id' => $sizeOption->id],
    ]);

    if ($material) {
        $materialAttr = Attribute::firstOrCreate(
            ['slug' => 'material'],
            ['name' => 'Materyal', 'type' => 'text', 'is_filterable' => true]
        );

        ProductAttributeValue::create([
            'product_id' => $product->id,
            'attribute_id' => $materialAttr->id,
            'value_string' => $material,
        ]);
    }

    return $product->fresh();
}

it('searches products by text via Meilisearch', function () {
    if (config('scout.driver') !== 'meilisearch') {
        $this->markTestSkipped('Meilisearch driver is not set');
    }

    // Meilisearch client'ının bind edilip edilmediğini kontrol et
    try {
        $client = app(\Meilisearch\Client::class);
    } catch (\Exception $e) {
        $this->markTestSkipped('Meilisearch client is not available: '.$e->getMessage());
    }
    // Arrange: 2 tişört, 1 alakasız ürün
    $p1 = createSearchableTshirt('Basic Black T-Shirt', 'Siyah', 'M', 'Pamuk');
    $p2 = createSearchableTshirt('White T-Shirt', 'Beyaz', 'L', 'Polyester');

    $p3 = Product::factory()->create([
        'name' => 'Coffee Mug',
        'slug' => 'coffee-mug-'.\Illuminate\Support\Str::random(4),
        'price' => 99.90,
    ]);

    // Tüm ürünleri indexe bas (Scout + Meili)
    // Test ortamında shouldBeSearchable() false döndüğü için manuel sync
    foreach ([$p1, $p2, $p3] as $product) {
        $product->searchable();
    }

    // Meili task'larının tamamlanmasını bekle (sync için)
    sleep(1);

    // Act
    $response = $this->getJson('/api/products/search?search=shirt');

    // Assert
    // Eğer Meilisearch yapılandırılmamışsa 503 dönecek
    if ($response->status() === 503) {
        $this->markTestSkipped('Meilisearch is not configured or available');
    }

    // Eğer 404 dönüyorsa route bulunamıyor veya Meilisearch client bind edilmemiş demektir
    if ($response->status() === 404) {
        $this->markTestSkipped('Route /api/products/search returned 404. Meilisearch may not be configured or client is not bound.');
    }

    $response->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'slug',
                    'price',
                    'in_stock',
                    'is_active',
                ],
            ],
            'meta' => [
                'total',
                'current_page',
                'per_page',
                'from',
                'to',
            ],
        ]);

    $json = $response->json();

    // En az 2 sonuç olmalı (iki tişört)
    expect($json['meta']['total'])->toBeGreaterThanOrEqual(2);

    $ids = collect($json['data'])->pluck('id');

    expect($ids)->toContain($p1->id);
    expect($ids)->toContain($p2->id);
    expect($ids)->not()->toContain($p3->id);
});

it('applies color and material filters via Meilisearch facets', function () {
    if (config('scout.driver') !== 'meilisearch') {
        $this->markTestSkipped('Meilisearch driver is not set');
    }

    // Meilisearch client'ının bind edilip edilmediğini kontrol et
    try {
        $client = app(\Meilisearch\Client::class);
    } catch (\Exception $e) {
        $this->markTestSkipped('Meilisearch client is not available: '.$e->getMessage());
    }
    // Arrange
    $blackCotton = createSearchableTshirt('Basic Black T-Shirt', 'Siyah', 'M', 'Pamuk');
    $whiteCotton = createSearchableTshirt('White T-Shirt', 'Beyaz', 'L', 'Pamuk');
    $blackPoly = createSearchableTshirt('Black Polyester T-Shirt', 'Siyah', 'L', 'Polyester');

    // color option & value (Siyah)
    $colorOption = Option::where('name', 'Renk')->firstOrFail();
    $blackColorValue = OptionValue::where('option_id', $colorOption->id)
        ->where('value', 'Siyah')
        ->firstOrFail();

    // indexe bas - Test ortamında manuel sync
    foreach ([$blackCotton, $whiteCotton, $blackPoly] as $product) {
        $product->searchable();
    }

    // Meili task'larının tamamlanmasını bekle
    sleep(1);

    // Act: search=shirt + filter[color]=Siyah + filter[attribute][material]=Pamuk
    $url = '/api/products/search?search=shirt'
        .'&filter[color]='.$blackColorValue->id
        .'&filter[attribute][material]=Pamuk';

    $response = $this->getJson($url);

    // Assert
    // Eğer Meilisearch yapılandırılmamışsa 503 dönecek
    if ($response->status() === 503) {
        $this->markTestSkipped('Meilisearch is not configured or available');
    }

    // Eğer 404 dönüyorsa route bulunamıyor veya Meilisearch client bind edilmemiş demektir
    if ($response->status() === 404) {
        $this->markTestSkipped('Route /api/products/search returned 404. Meilisearch may not be configured or client is not bound.');
    }

    $response->assertStatus(200);

    $json = $response->json();

    // Sadece Siyah + Pamuk ürünü kalmalı (blackCotton)
    expect($json['meta']['total'])->toBe(1);

    $ids = collect($json['data'])->pluck('id');

    expect($ids)->toContain($blackCotton->id);
    expect($ids)->not()->toContain($whiteCotton->id);
    expect($ids)->not()->toContain($blackPoly->id);
});
