<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * is_active status'u variation template'lerde değil, variant'larda (mix'lerde) olmalı.
     * product_variations tablosunda zaten is_active var.
     */
    public function up(): void
    {
        Schema::table('product_variation_templates', function (Blueprint $table) {
            // is_active kolonu zaten yeni migration'da yok, bu migration sadece eski veriler için
            // Eğer kolon varsa kaldır
            if (Schema::hasColumn('product_variation_templates', 'is_active')) {
                // Index'i kontrol et ve varsa kaldır
                $sm = Schema::getConnection()->getDoctrineSchemaManager();
                $indexesFound = $sm->listTableIndexes('product_variation_templates');
                if (isset($indexesFound['product_variation_templates_is_active_index'])) {
                    $table->dropIndex('product_variation_templates_is_active_index');
                }
                $table->dropColumn('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variation_templates', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('variation_template_id');
            $table->index('is_active');
        });
    }
};
