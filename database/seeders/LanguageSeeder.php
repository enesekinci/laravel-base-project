<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'Türkçe',
                'code' => 'tr',
                'native_name' => 'Türkçe',
                'flag' => '🇹🇷',
                'is_active' => true,
                'is_default' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'English',
                'code' => 'en',
                'native_name' => 'English',
                'flag' => '🇬🇧',
                'is_active' => true,
                'is_default' => false,
                'sort_order' => 2,
            ],
            [
                'name' => 'Русский',
                'code' => 'ru',
                'native_name' => 'Русский',
                'flag' => '🇷🇺',
                'is_active' => true,
                'is_default' => false,
                'sort_order' => 3,
            ],
            [
                'name' => 'العربية',
                'code' => 'ar',
                'native_name' => 'العربية',
                'flag' => '🇸🇦',
                'is_active' => true,
                'is_default' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Français',
                'code' => 'fr',
                'native_name' => 'Français',
                'flag' => '🇫🇷',
                'is_active' => true,
                'is_default' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'Deutsch',
                'code' => 'de',
                'native_name' => 'Deutsch',
                'flag' => '🇩🇪',
                'is_active' => true,
                'is_default' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($languages as $language) {
            Language::updateOrCreate(
                ['code' => $language['code']],
                $language
            );
        }

        // Eğer başka bir dil default olarak işaretlenmişse, onu kaldır
        Language::where('code', '!=', 'tr')
            ->update(['is_default' => false]);
    }
}
