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
        Schema::create('option_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('option_id');
            $table->string('label');
            $table->string('value')->nullable();
            $table->decimal('price_adjustment', 10, 2)->default(0);
            $table->string('price_type')->default('fixed'); // fixed, percentage
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade');

            $table->index('option_id');
            $table->index('sort_order');
        });

        // Seed data
        $now = now();

        // Options'ları bul
        $warranty = DB::table('options')->where('name', 'Garanti Süresi')->first();
        $installation = DB::table('options')->where('name', 'Kurulum Hizmeti')->first();
        $extraRam = DB::table('options')->where('name', 'Ekstra RAM')->first();

        if ($warranty) {
            DB::table('option_values')->insert([
                ['option_id' => $warranty->id, 'label' => '1 Yıl Garanti', 'value' => '1-year', 'price_adjustment' => 0, 'price_type' => 'fixed', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['option_id' => $warranty->id, 'label' => '2 Yıl Garanti', 'value' => '2-year', 'price_adjustment' => 500, 'price_type' => 'fixed', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
                ['option_id' => $warranty->id, 'label' => '3 Yıl Garanti', 'value' => '3-year', 'price_adjustment' => 1000, 'price_type' => 'fixed', 'sort_order' => 3, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($installation) {
            DB::table('option_values')->insert([
                ['option_id' => $installation->id, 'label' => 'Evde Kurulum', 'value' => 'home-installation', 'price_adjustment' => 250, 'price_type' => 'fixed', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['option_id' => $installation->id, 'label' => 'Ofis Kurulumu', 'value' => 'office-installation', 'price_adjustment' => 500, 'price_type' => 'fixed', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }

        if ($extraRam) {
            DB::table('option_values')->insert([
                ['option_id' => $extraRam->id, 'label' => '+8 GB RAM', 'value' => '8gb-ram', 'price_adjustment' => 1500, 'price_type' => 'fixed', 'sort_order' => 1, 'created_at' => $now, 'updated_at' => $now],
                ['option_id' => $extraRam->id, 'label' => '+16 GB RAM', 'value' => '16gb-ram', 'price_adjustment' => 3000, 'price_type' => 'fixed', 'sort_order' => 2, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_values');
    }
};
