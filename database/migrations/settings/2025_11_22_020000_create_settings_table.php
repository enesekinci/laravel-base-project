<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table): void {
            $table->id();
            $table->string('group')->default('general'); // general, storefront, mail, sms, currency, payment, shipping
            $table->string('key');                       // "site_name", "logo_url", "mail_host"
            $table->json('value')->nullable();           // typed value
            $table->string('type')->default('string');   // string, boolean, integer, json
            $table->timestamps();

            $table->unique(['group', 'key']);
            $table->index('group');
        });

        // Başlangıç verileri
        $now = now();

        // General Settings
        $generalSettings = [
            'site_name' => 'Laravel Base Project',
            'site_description' => 'Modern Laravel boilerplate',
            'site_email' => 'info@example.com',
            'site_phone' => '+90 555 123 4567',
            'site_address' => 'Istanbul, Turkey',
            'maintenance_mode' => false,
        ];

        foreach ($generalSettings as $key => $value) {
            DB::table('settings')->insert([
                'group' => 'general',
                'key' => $key,
                'value' => json_encode(['value' => $value]),
                'type' => \is_bool($value) ? 'boolean' : (is_numeric($value) ? 'integer' : 'string'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Mail Settings
        $mailSettings = [
            'mail_driver' => 'smtp',
            'mail_host' => 'smtp.mailtrap.io',
            'mail_port' => 2525,
            'mail_username' => '',
            'mail_password' => '',
            'mail_encryption' => 'tls',
            'mail_from_address' => 'noreply@example.com',
            'mail_from_name' => 'Laravel Base Project',
        ];

        foreach ($mailSettings as $key => $value) {
            DB::table('settings')->insert([
                'group' => 'mail',
                'key' => $key,
                'value' => json_encode(['value' => $value]),
                'type' => \is_bool($value) ? 'boolean' : (is_numeric($value) ? 'integer' : 'string'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // SMS Settings
        $smsSettings = [
            'sms_provider' => 'twilio',
            'sms_api_key' => '',
            'sms_api_secret' => '',
            'sms_from_number' => '',
            'enable_sms_notifications' => false,
        ];

        foreach ($smsSettings as $key => $value) {
            DB::table('settings')->insert([
                'group' => 'sms',
                'key' => $key,
                'value' => json_encode(['value' => $value]),
                'type' => \is_bool($value) ? 'boolean' : (is_numeric($value) ? 'integer' : 'string'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
