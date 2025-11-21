<?php

use App\Models\StoreSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Site Logo
        StoreSetting::updateOrCreate(
            ['key' => 'site_logo'],
            [
                'value' => '/porto/assets/images/logo.png',
                'group' => 'site',
            ]
        );

        // Site Phone
        StoreSetting::updateOrCreate(
            ['key' => 'site_phone'],
            [
                'value' => '+123 5678 890',
                'group' => 'site',
            ]
        );

        // Site Phone Text
        StoreSetting::updateOrCreate(
            ['key' => 'site_phone_text'],
            [
                'value' => 'Call us now',
                'group' => 'site',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        StoreSetting::whereIn('key', ['site_logo', 'site_phone', 'site_phone_text'])->delete();
    }
};
