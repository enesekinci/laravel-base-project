<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SQLite'de kolon silmek için önce index'leri kaldırmalıyız
        Schema::table('variations', function (Blueprint $table) {
            // Index'leri kaldır
            $table->dropIndex(['slug']);
            $table->dropIndex(['sku']);
            $table->dropIndex(['is_active']);
            $table->dropIndex(['sort_order']);
        });

        // SQLite'de kolon silmek için tabloyu yeniden oluşturmalıyız
        if (DB::getDriverName() === 'sqlite') {
            // Mevcut verileri yedekle
            DB::statement('CREATE TABLE variations_backup AS SELECT id, name, type, created_at, updated_at, deleted_at FROM variations');
            
            // Eski tabloyu sil
            Schema::dropIfExists('variations');
            
            // Yeni tabloyu oluştur
            Schema::create('variations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('type')->default('text'); // SQLite enum desteklemiyor
                $table->timestamps();
                $table->softDeletes();

                $table->index('type');
            });
            
            // Verileri geri yükle
            DB::statement('INSERT INTO variations (id, name, type, created_at, updated_at, deleted_at) SELECT id, name, type, created_at, updated_at, deleted_at FROM variations_backup');
            
            // Yedek tabloyu sil
            DB::statement('DROP TABLE variations_backup');
        } else {
            // MySQL/PostgreSQL için normal drop
            Schema::table('variations', function (Blueprint $table) {
                $table->dropColumn([
                    'slug',
                    'description',
                    'attribute_values',
                    'sku',
                    'price',
                    'compare_price',
                    'stock',
                    'image',
                    'is_active',
                    'sort_order',
                ]);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('variations', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
            $table->text('description')->nullable()->after('slug');
            $table->json('attribute_values')->nullable()->after('description');
            $table->string('sku')->unique()->nullable()->after('attribute_values');
            $table->decimal('price', 10, 2)->default(0)->after('sku');
            $table->decimal('compare_price', 10, 2)->nullable()->after('price');
            $table->integer('stock')->default(0)->after('compare_price');
            $table->string('image')->nullable()->after('stock');
            $table->boolean('is_active')->default(true)->after('image');
            $table->integer('sort_order')->default(0)->after('is_active');

            $table->index('slug');
            $table->index('sku');
            $table->index('is_active');
            $table->index('sort_order');
        });
    }
};
