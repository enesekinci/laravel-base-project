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

        // Attribute categories pivot table
        Schema::create('attribute_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->unique(['attribute_id', 'category_id']);
            $table->index('attribute_id');
            $table->index('category_id');
        });

        // Seed data - Sadece attributes, attribute_values seed data'sı attribute_values migration'ında
        $computerSet = DB::table('attribute_sets')->where('slug', 'bilgisayar-ozellikleri')->first();
        $computerSetId = $computerSet->id ?? 1;

        $now = now();

        // Ekran Boyutu
        DB::table('attributes')->insert([
            'name' => 'Ekran Boyutu',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // RAM
        DB::table('attributes')->insert([
            'name' => 'RAM',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Depolama
        DB::table('attributes')->insert([
            'name' => 'Depolama',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 3,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // İşlemci
        DB::table('attributes')->insert([
            'name' => 'İşlemci',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // İşletim Sistemi
        DB::table('attributes')->insert([
            'name' => 'İşletim Sistemi',
            'attribute_set_id' => $computerSetId,
            'is_filterable' => true,
            'is_required' => false,
            'sort_order' => 5,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_categories');
        Schema::dropIfExists('attributes');
    }
};
