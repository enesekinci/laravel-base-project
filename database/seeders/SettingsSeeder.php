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
            'site_name' => 'Laravel Base Project',
            'site_description' => 'Modern Laravel boilerplate',
            'site_email' => 'info@example.com',
            'site_phone' => '+90 555 123 4567',
            'site_address' => 'Istanbul, Turkey',
            'maintenance_mode' => false,
        ];

        foreach ($generalSettings as $key => $value) {
            Setting::updateOrCreate(
                ['group' => 'general', 'key' => $key],
                [
                    'value' => ['value' => $value],
                    'type' => \is_bool($value) ? 'boolean' : (is_numeric($value) ? 'integer' : 'string'),
                ]
            );
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
            Setting::updateOrCreate(
                ['group' => 'mail', 'key' => $key],
                [
                    'value' => ['value' => $value],
                    'type' => \is_bool($value) ? 'boolean' : (is_numeric($value) ? 'integer' : 'string'),
                ]
            );
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
            Setting::updateOrCreate(
                ['group' => 'sms', 'key' => $key],
                [
                    'value' => ['value' => $value],
                    'type' => \is_bool($value) ? 'boolean' : (is_numeric($value) ? 'integer' : 'string'),
                ]
            );
        }
    }
}
