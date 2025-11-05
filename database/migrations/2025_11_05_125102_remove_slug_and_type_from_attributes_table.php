<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SQLite'de ALTER TABLE ile kolon silme sorunlu olduğu için
        // tabloyu yeniden oluşturma yaklaşımı kullanıyoruz.
        if (DB::connection()->getDriverName() === 'sqlite') {
            // Mevcut verileri yedekle
            DB::statement('CREATE TABLE attributes_backup AS SELECT id, name, attribute_set_id, is_filterable, is_required, sort_order, created_at, updated_at, deleted_at FROM attributes');

            // Eski tabloyu sil
            Schema::dropIfExists('attributes');

            // Yeni tabloyu oluştur
            Schema::create('attributes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('attribute_set_id')->nullable();
                $table->boolean('is_filterable')->default(false);
                $table->boolean('is_required')->default(false);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('attribute_set_id')
                    ->references('id')
                    ->on('attribute_sets')
                    ->onDelete('set null');
                $table->index('attribute_set_id');
                $table->index('is_filterable');
                $table->index('sort_order');
            });

            // Verileri geri yükle
            DB::statement('INSERT INTO attributes (id, name, attribute_set_id, is_filterable, is_required, sort_order, created_at, updated_at, deleted_at) SELECT id, name, attribute_set_id, is_filterable, is_required, sort_order, created_at, updated_at, deleted_at FROM attributes_backup');

            // Yedek tabloyu sil
            DB::statement('DROP TABLE attributes_backup');
        } else {
            Schema::table('attributes', function (Blueprint $table) {
                // Indexleri kaldır
                $table->dropIndex(['slug']);
                $table->dropIndex(['type']);

                // Kolonları kaldır
                $table->dropColumn(['slug', 'type']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getDriverName() === 'sqlite') {
            // SQLite için geri alma işlemi zor olduğu için boş bırakıldı
            // Manuel olarak eski kolonları eklemek gerekebilir
        } else {
            Schema::table('attributes', function (Blueprint $table) {
                $table->string('slug')->unique()->after('name');
                $table->string('type')->default('text')->after('slug');
                $table->index('slug');
                $table->index('type');
            });
        }
    }
};
