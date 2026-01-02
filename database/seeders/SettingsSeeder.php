<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        // General Settings
        $generalSettings = [
            ['key' => 'site_name', 'value' => 'Laravel Base Project', 'type' => 'string'],
            ['key' => 'site_description', 'value' => 'Modern Laravel boilerplate', 'type' => 'string'],
            ['key' => 'site_email', 'value' => 'info@example.com', 'type' => 'string'],
            ['key' => 'site_phone', 'value' => '+90 555 123 4567', 'type' => 'string'],
            ['key' => 'site_address', 'value' => 'Istanbul, Turkey', 'type' => 'string'],
            ['key' => 'maintenance_mode', 'value' => false, 'type' => 'boolean'],
        ];

        foreach ($generalSettings as $setting) {
            Setting::updateOrCreate(
                ['group' => 'general', 'key' => $setting['key']],
                [
                    'value' => ['value' => $setting['value']],
                    'type' => $setting['type'],
                ]
            );
        }

        // Mail Settings
        $mailSettings = [
            ['key' => 'mail_driver', 'value' => 'smtp', 'type' => 'string'],
            ['key' => 'mail_host', 'value' => 'smtp.mailtrap.io', 'type' => 'string'],
            ['key' => 'mail_port', 'value' => 2525, 'type' => 'integer'],
            ['key' => 'mail_username', 'value' => '', 'type' => 'string'],
            ['key' => 'mail_password', 'value' => '', 'type' => 'string'],
            ['key' => 'mail_encryption', 'value' => 'tls', 'type' => 'string'],
            ['key' => 'mail_from_address', 'value' => 'noreply@example.com', 'type' => 'string'],
            ['key' => 'mail_from_name', 'value' => 'Laravel Base Project', 'type' => 'string'],
        ];

        foreach ($mailSettings as $setting) {
            Setting::updateOrCreate(
                ['group' => 'mail', 'key' => $setting['key']],
                [
                    'value' => ['value' => $setting['value']],
                    'type' => $setting['type'],
                ]
            );
        }

        // SMS Settings
        $smsSettings = [
            ['key' => 'sms_provider', 'value' => 'twilio', 'type' => 'string'],
            ['key' => 'sms_api_key', 'value' => '', 'type' => 'string'],
            ['key' => 'sms_api_secret', 'value' => '', 'type' => 'string'],
            ['key' => 'sms_from_number', 'value' => '', 'type' => 'string'],
            ['key' => 'enable_sms_notifications', 'value' => false, 'type' => 'boolean'],
        ];

        foreach ($smsSettings as $setting) {
            Setting::updateOrCreate(
                ['group' => 'sms', 'key' => $setting['key']],
                [
                    'value' => ['value' => $setting['value']],
                    'type' => $setting['type'],
                ]
            );
        }
    }
}
