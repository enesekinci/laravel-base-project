<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateFooterSettingsRequest;
use App\Services\StoreSettingService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class FooterController extends Controller
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    public function edit(): Response
    {
        $getSetting = function (string $key, $default = null) {
            return $this->storeSettingService->get($key, $default);
        };

        $getJsonSetting = function (string $key, array $default = []) use ($getSetting) {
            $value = $getSetting($key);
            if (empty($value) || $value === null) {
                return $default;
            }
            $decoded = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return $default;
            }
            return is_array($decoded) ? $decoded : $default;
        };

        $settings = [
            // About Us
            'footer_about_logo' => $getSetting('footer_about_logo', '/porto/assets/images/logo-footer.png'),
            'footer_about_description' => $getSetting('footer_about_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Duis nec vestibulum magna, et dapibus lacus.'),
            'footer_about_read_more_url' => $getSetting('footer_about_read_more_url', '#'),

            // Contact Info
            'footer_contact_address' => $getSetting('footer_contact_address', '123 Street Name, City, England'),
            'footer_contact_phone' => $getSetting('footer_contact_phone', '(123) 456-7890'),
            'footer_contact_email' => $getSetting('footer_contact_email', 'mail@example.com'),
            'footer_contact_working_hours' => $getSetting('footer_contact_working_hours', 'Mon - Sun / 9:00 AM - 8:00 PM'),

            // Social Media
            'footer_social_facebook' => $getSetting('footer_social_facebook', '#'),
            'footer_social_twitter' => $getSetting('footer_social_twitter', '#'),
            'footer_social_linkedin' => $getSetting('footer_social_linkedin', '#'),

            // Customer Service Links
            'footer_customer_service_links' => $getJsonSetting('footer_customer_service_links', [
                ['label' => 'Help & FAQs', 'url' => '#'],
                ['label' => 'Order Tracking', 'url' => '#'],
                ['label' => 'Shipping & Delivery', 'url' => '#'],
                ['label' => 'Orders History', 'url' => '#'],
                ['label' => 'Advanced Search', 'url' => '#'],
                ['label' => 'My Account', 'url' => '/porto/dashboard.html'],
                ['label' => 'Careers', 'url' => '#'],
                ['label' => 'About Us', 'url' => '/porto/demo1-about.html'],
                ['label' => 'Corporate Sales', 'url' => '#'],
                ['label' => 'Privacy', 'url' => '#'],
            ]),

            // Popular Tags
            'footer_popular_tags' => $getJsonSetting('footer_popular_tags', [
                'Bag',
                'Black',
                'Blue',
                'Clothes',
                'Fashion',
                'Hub',
                'Jean',
                'Shirt',
                'Skirt',
                'Sports',
                'Sweater',
                'Winter',
            ]),

            // Copyright
            'footer_copyright' => $getSetting('footer_copyright', '© Porto eCommerce. 2021. All Rights Reserved'),

            // Payment Icons
            'footer_payment_icons' => $getJsonSetting('footer_payment_icons', [
                ['name' => 'visa', 'enabled' => true],
                ['name' => 'paypal', 'enabled' => true],
                ['name' => 'stripe', 'enabled' => true],
                ['name' => 'verisign', 'enabled' => true],
            ]),
        ];

        return Inertia::render('Admin/FooterSettings/Edit', [
            'settings' => $settings,
        ]);
    }

    public function update(UpdateFooterSettingsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Basit string ayarları
        $this->storeSettingService->set('footer_about_logo', $validated['footer_about_logo'] ?? '', 'footer');
        $this->storeSettingService->set('footer_about_description', $validated['footer_about_description'] ?? '', 'footer');
        $this->storeSettingService->set('footer_about_read_more_url', $validated['footer_about_read_more_url'] ?? '#', 'footer');
        $this->storeSettingService->set('footer_contact_address', $validated['footer_contact_address'] ?? '', 'footer');
        $this->storeSettingService->set('footer_contact_phone', $validated['footer_contact_phone'] ?? '', 'footer');
        $this->storeSettingService->set('footer_contact_email', $validated['footer_contact_email'] ?? '', 'footer');
        $this->storeSettingService->set('footer_contact_working_hours', $validated['footer_contact_working_hours'] ?? '', 'footer');
        $this->storeSettingService->set('footer_social_facebook', $validated['footer_social_facebook'] ?? '#', 'footer');
        $this->storeSettingService->set('footer_social_twitter', $validated['footer_social_twitter'] ?? '#', 'footer');
        $this->storeSettingService->set('footer_social_linkedin', $validated['footer_social_linkedin'] ?? '#', 'footer');
        $this->storeSettingService->set('footer_copyright', $validated['footer_copyright'] ?? '', 'footer');

        // JSON array ayarları
        $this->storeSettingService->set('footer_customer_service_links', json_encode($validated['footer_customer_service_links'] ?? []), 'footer');
        $this->storeSettingService->set('footer_popular_tags', json_encode($validated['footer_popular_tags'] ?? []), 'footer');
        $this->storeSettingService->set('footer_payment_icons', json_encode($validated['footer_payment_icons'] ?? []), 'footer');

        return redirect()
            ->route('admin.footer-settings.edit')
            ->with('success', 'Footer ayarları başarıyla güncellendi.');
    }
}
