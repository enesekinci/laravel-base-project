<?php

namespace Database\Seeders;

use App\Models\{
    Brand,
    TaxClass,
    AttributeSet,
    Attribute,
    Option,
    OptionValue,
    Product,
    ProductVariant,
    ProductAttributeValue
};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductDemoSeeder extends Seeder
{
    public function run(): void
    {
        // BRAND
        $brand = Brand::create([
            'name' => 'Generic Brand',
            'slug' => 'generic-brand',
            'is_active' => true,
        ]);

        // TAX CLASS
        $tax = TaxClass::create([
            'name' => 'Standard VAT 20%',
            'rate' => 20,
            'is_active' => true,
        ]);

        // ATTRIBUTE SET
        $attributeSet = AttributeSet::create([
            'name' => 'Tişört',
            'slug' => 'tshirt',
        ]);

        // ATTRIBUTES (Materyal, Yaka Tipi)
        $materialAttribute = Attribute::create([
            'name'          => 'Materyal',
            'slug'          => 'material',
            'type'          => 'text',
            'is_filterable' => true,
            'is_required'   => false,
            'sort_order'    => 10,
        ]);

        $neckAttribute = Attribute::create([
            'name'          => 'Yaka Tipi',
            'slug'          => 'neck_type',
            'type'          => 'text',
            'is_filterable' => false,
            'is_required'   => false,
            'sort_order'    => 20,
        ]);

        // ATTRIBUTE SET RELATION
        $attributeSet->attributes()->attach([
            $materialAttribute->id => ['sort_order' => 10],
            $neckAttribute->id     => ['sort_order' => 20],
        ]);

        // OPTIONS: Renk, Beden
        $colorOption = Option::create([
            'name' => 'Renk',
            'type' => 'select',
        ]);

        $sizeOption = Option::create([
            'name' => 'Beden',
            'type' => 'select',
        ]);

        $black = OptionValue::create([
            'option_id' => $colorOption->id,
            'value'     => 'Siyah',
            'sort_order' => 10,
        ]);

        $white = OptionValue::create([
            'option_id' => $colorOption->id,
            'value'     => 'Beyaz',
            'sort_order' => 20,
        ]);

        $sizeS = OptionValue::create([
            'option_id' => $sizeOption->id,
            'value'     => 'S',
            'sort_order' => 10,
        ]);

        $sizeM = OptionValue::create([
            'option_id' => $sizeOption->id,
            'value'     => 'M',
            'sort_order' => 20,
        ]);

        $sizeL = OptionValue::create([
            'option_id' => $sizeOption->id,
            'value'     => 'L',
            'sort_order' => 30,
        ]);

        // PRODUCT
        $product = Product::create([
            'name'              => 'Basic T-Shirt',
            'slug'              => Str::slug('Basic T-Shirt'),
            'sku'               => 'TSHIRT-BASIC',
            'description'       => 'Basic tişört açıklaması',
            'short_description' => 'Basic tişört',
            'price'             => 299.90,
            'manage_stock'      => true,
            'quantity'          => 0,
            'in_stock'          => true,
            'brand_id'          => $brand->id,
            'tax_class_id'      => $tax->id,
            'is_active'         => true,
        ]);

        // PRODUCT ATTRIBUTES VALUES (EAV)
        ProductAttributeValue::create([
            'product_id'     => $product->id,
            'attribute_id'   => $materialAttribute->id,
            'value_string'   => 'Pamuk',
        ]);

        ProductAttributeValue::create([
            'product_id'     => $product->id,
            'attribute_id'   => $neckAttribute->id,
            'value_string'   => 'Bisiklet Yaka',
        ]);

        // VARIANTLAR
        $combinations = [
            [$black, $sizeS],
            [$black, $sizeM],
            [$black, $sizeL],
            [$white, $sizeS],
            [$white, $sizeM],
            [$white, $sizeL],
        ];

        $i = 1;

        foreach ($combinations as [$color, $size]) {
            /** @var OptionValue $color */
            /** @var OptionValue $size */

            $variant = ProductVariant::create([
                'product_id'     => $product->id,
                'sku'            => 'TSHIRT-BASIC-' . strtoupper(substr($color->value, 0, 1)) . '-' . $size->value,
                'price'          => 299.90,
                'manage_stock'   => true,
                'quantity'       => 10,
                'in_stock'       => true,
                'is_active'      => true,
            ]);

            // variant_option_values pivot
            $variant->optionValues()->attach([
                $color->id => ['option_id' => $colorOption->id],
                $size->id  => ['option_id' => $sizeOption->id],
            ]);

            $i++;
        }
    }
}
