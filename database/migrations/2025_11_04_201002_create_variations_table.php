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
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('text'); // text, color, image
            $table->timestamps();
            $table->softDeletes();

            $table->index('type');
        });

        // Seed data
        $now = now();

        // Renk
        DB::table('variations')->insert([
            'name' => 'Renk',
            'type' => 'color',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Boyut
        DB::table('variations')->insert([
            'name' => 'Boyut',
            'type' => 'text',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Kapasite
        DB::table('variations')->insert([
            'name' => 'Kapasite',
            'type' => 'text',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variations');
    }
};
