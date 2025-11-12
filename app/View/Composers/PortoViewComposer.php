<?php

namespace App\View\Composers;

use App\Services\StoreSettingService;
use Illuminate\View\View;

class PortoViewComposer
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    /**
     * Porto template view'larına ortak verileri ekler
     */
    public function compose(View $view): void
    {
        // Footer settings'i al
        $footerSettings = $this->getFooterSettings();

        // Menüleri ve footer settings'i ekle
        $view->with([
            'sidebarMenu' => get_menu_by_location('sidebar'),
            'headerMenu' => get_menu_by_location('header'),
            'footerMenu' => get_menu_by_location('footer'),
            'footerSettings' => $footerSettings,
        ]);
    }

    /**
     * Footer ayarlarını döndürür
     */
    private function getFooterSettings(): array
    {
        $getSetting = function (string $key) {
            return $this->storeSettingService->get($key);
        };

        $getJsonSetting = function (string $key) use ($getSetting) {
            $value = $getSetting($key);
            if (empty($value) || $value === null) {
                return [];
            }
            $decoded = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [];
            }
            return is_array($decoded) ? $decoded : [];
        };

        return [
            // About Us
            'about_logo' => $getSetting('footer_about_logo'),
            'about_description' => $getSetting('footer_about_description'),
            'about_read_more_url' => $getSetting('footer_about_read_more_url'),

            // Contact Info
            'contact_address' => $getSetting('footer_contact_address'),
            'contact_phone' => $getSetting('footer_contact_phone'),
            'contact_email' => $getSetting('footer_contact_email'),
            'contact_working_hours' => $getSetting('footer_contact_working_hours'),

            // Social Media
            'social_facebook' => $getSetting('footer_social_facebook'),
            'social_twitter' => $getSetting('footer_social_twitter'),
            'social_linkedin' => $getSetting('footer_social_linkedin'),

            // Customer Service Links
            'customer_service_links' => $getJsonSetting('footer_customer_service_links'),

            // Popular Tags
            'popular_tags' => $getJsonSetting('footer_popular_tags'),

            // Copyright
            'copyright' => $getSetting('footer_copyright'),

            // Payment Icons
            'payment_icons' => $getJsonSetting('footer_payment_icons'),
        ];
    }
}
