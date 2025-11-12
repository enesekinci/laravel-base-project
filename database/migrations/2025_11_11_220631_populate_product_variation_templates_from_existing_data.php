<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Mevcut product_variations ve product_variation_values tablolarından
     * product_variation_templates tablosuna veri aktarır.
     * 
     * Her product için unique variation_template_id'leri bulur ve
     * product_variation_templates tablosuna ekler.
     */
    public function up(): void
    {
        // Tüm product'ları al
        $products = DB::table('products')->get();

        foreach ($products as $product) {
            // Bu product'a ait tüm variation'ları al
            $variations = DB::table('product_variations')
                ->where('product_id', $product->id)
                ->get();

            if ($variations->isEmpty()) {
                continue;
            }

            // Bu product'a ait unique variation_template_id'leri bul
            $uniqueTemplateIds = DB::table('product_variation_values')
                ->join('product_variations', 'product_variation_values.product_variation_id', '=', 'product_variations.id')
                ->where('product_variations.product_id', $product->id)
                ->select('product_variation_values.variation_template_id')
                ->distinct()
                ->pluck('variation_template_id')
                ->filter()
                ->unique()
                ->toArray();

            // Her unique template_id için product_variation_templates kaydı oluştur
            foreach ($uniqueTemplateIds as $index => $templateId) {
                // Zaten kayıt var mı kontrol et
                $exists = DB::table('product_variation_templates')
                    ->where('product_id', $product->id)
                    ->where('variation_template_id', $templateId)
                    ->exists();

                if (!$exists) {
                    DB::table('product_variation_templates')->insert([
                        'product_id' => $product->id,
                        'variation_template_id' => $templateId,
                        'sort_order' => $index,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Bu migration'ı geri almak için product_variation_templates tablosunu temizle
        // Ancak dikkatli olun, bu veri kaybına neden olabilir
        // DB::table('product_variation_templates')->truncate();

        // Veya sadece bu migration ile eklenen kayıtları silmek istiyorsanız:
        // Migration timestamp'ine göre silme yapılabilir ama bu karmaşık olur
        // Bu yüzden down() metodunu boş bırakıyoruz
    }
};
