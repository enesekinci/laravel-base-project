<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group')->default('general'); // general, storefront, mail, sms, currency, payment, shipping
            $table->string('key');                       // "site_name", "logo_url", "mail_host"
            $table->json('value')->nullable();           // typed value
            $table->string('type')->default('string');   // string, boolean, integer, json
            $table->timestamps();

            $table->unique(['group', 'key']);
            $table->index('group');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
