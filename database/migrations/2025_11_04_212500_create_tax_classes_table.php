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
        Schema::create('tax_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('rate', 5, 2)->default(0); // 0.00 - 100.00
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->index('is_active');
        });

        // Seed data
        $now = now();
        DB::table('tax_classes')->insert([
            ['name' => 'KDV %0', 'rate' => 0.00, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'KDV %1', 'rate' => 1.00, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'KDV %10', 'rate' => 10.00, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'KDV %20', 'rate' => 20.00, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_classes');
    }
};
