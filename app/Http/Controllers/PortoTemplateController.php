<?php

namespace App\Http\Controllers;

use App\Services\StoreSettingService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class PortoTemplateController extends Controller
{
    public function __construct(
        private StoreSettingService $storeSettingService
    ) {}

    /**
     * Porto template sayfalarını render eder
     */
    public function show(?string $page = null): Response
    {
        // Eğer page null ise veya boşsa index kullan
        if (empty($page)) {
            $page = 'index';
        }

        // .html uzantısını kaldır
        $page = str_replace('.html', '', $page);

        // Yeni klasör yapısına göre view path'ini belirle
        // Örnek: demo1 -> porto/demo1/index, demo1-about -> porto/demo1/about
        $bladeView = null;

        // Demo sayfası mı kontrol et (demo1, demo1-about, etc.)
        if (preg_match('/^demo(\d+)(?:-(.+))?$/', $page, $matches)) {
            $demoNum = $matches[1];
            $subPage = $matches[2] ?? 'index';
            $bladeView = "porto.demo{$demoNum}.{$subPage}";
        } else {
            // Eski format (demo1.html gibi)
            $bladeView = "porto.{$page}";
        }

        // Önce yeni klasör yapısında kontrol et
        if ($bladeView && view()->exists($bladeView)) {
            // Demo CSS'i belirle
            $demoCss = 'demo1';
            if (preg_match('/demo(\d+)/', $page, $matches)) {
                $demoCss = 'demo' . $matches[1];
            }

            // Main class'ı belirle - JSON dosyasından oku
            $mainClass = $this->getMainClass($page);

            // Body class ve attributes belirle
            $bodyClass = $this->getBodyClass($page);
            $bodyAttributes = $this->getBodyAttributes($page);

            // dd([
            //     'demoCss' => $demoCss,
            //     'mainClass' => $mainClass,
            //     'bodyClass' => $bodyClass,
            //     'bodyAttributes' => $bodyAttributes,
            // ]);

            $topNotice = $this->getTopNotice();
            $categories = category_tree();
            $chunkedCategories = category_tree_chunked(2);
            $sidebarMenu = get_menu_by_location('sidebar');
            $headerMenu = get_menu_by_location('header');
            $footerMenu = get_menu_by_location('footer');
            $footerSettings = $this->getFooterSettings();

            return response()->view($bladeView, [
                'demoCss' => $demoCss,
                'mainClass' => $mainClass,
                'bodyClass' => $bodyClass,
                'bodyAttributes' => $bodyAttributes,
                'topNotice' => $topNotice,
                'categories' => $categories,
                'chunkedCategories' => $chunkedCategories,
                'sidebarMenu' => $sidebarMenu,
                'headerMenu' => $headerMenu,
                'footerMenu' => $footerMenu,
                'footerSettings' => $footerSettings,
            ]);
        }

        // Eski formatı dene (geriye dönük uyumluluk)
        $oldBladeView = "porto.{$page}";
        if (view()->exists($oldBladeView)) {
            $demoCss = 'demo1';
            if (preg_match('/demo(\d+)/', $page, $matches)) {
                $demoCss = 'demo' . $matches[1];
            }

            $mainClass = $this->getMainClass($page);
            $bodyClass = $this->getBodyClass($page);
            $bodyAttributes = $this->getBodyAttributes($page);

            $topNotice = $this->getTopNotice();
            $categories = category_tree();
            $chunkedCategories = category_tree_chunked(2);
            $sidebarMenu = get_menu_by_location('sidebar');
            $headerMenu = get_menu_by_location('header');
            $footerMenu = get_menu_by_location('footer');
            $footerSettings = $this->getFooterSettings();

            return response()->view($oldBladeView, [
                'demoCss' => $demoCss,
                'mainClass' => $mainClass,
                'bodyClass' => $bodyClass,
                'bodyAttributes' => $bodyAttributes,
                'topNotice' => $topNotice,
                'categories' => $categories,
                'chunkedCategories' => $chunkedCategories,
                'sidebarMenu' => $sidebarMenu,
                'headerMenu' => $headerMenu,
                'footerMenu' => $footerMenu,
                'footerSettings' => $footerSettings,
            ]);
        }

        // Blade view yoksa HTML dosyasını render et (geriye dönük uyumluluk)
        $htmlPath = resource_path("views/porto/{$page}.html");

        if (!File::exists($htmlPath)) {
            abort(404, "Sayfa bulunamadı: {$page}");
        }

        $content = File::get($htmlPath);

        // Path'ler zaten düzeltilmiş olmalı, ama yine de kontrol edelim
        return response($content)->header('Content-Type', 'text/html; charset=utf-8');
    }

    /**
     * Sayfa için doğru main class'ını döndürür
     */
    private function getMainClass(string $page): string
    {
        // Demo numarasını çıkar
        if (preg_match('/demo(\d+)/', $page, $matches)) {
            $demoNum = (int) $matches[1];
        } elseif (preg_match('/demo(\d+)-/', $page, $matches)) {
            $demoNum = (int) $matches[1];
        } else {
            // Demo değilse, sayfa tipine göre class belirle
            if (str_contains($page, 'shop')) {
                return 'shop';
            } elseif (str_contains($page, 'product')) {
                return 'product';
            } elseif (str_contains($page, 'category')) {
                return 'category';
            } elseif (str_contains($page, 'cart') || str_contains($page, 'checkout')) {
                return 'checkout';
            } elseif (str_contains($page, 'about') || str_contains($page, 'contact')) {
                return 'about';
            } elseif (str_contains($page, 'blog')) {
                return 'blog';
            }
            return '';
        }

        // JSON dosyasından class'ı oku
        $classesFile = base_path('demo-classes.json');
        if (file_exists($classesFile)) {
            $classes = json_decode(file_get_contents($classesFile), true);
            if (isset($classes[$demoNum]['main'])) {
                $mainClass = $classes[$demoNum]['main'];
                // "main" kelimesini kaldır, sadece ek class'ları döndür
                // Önce class'ları parçalara ayır
                $classParts = explode(' ', $mainClass);
                $classParts = array_filter($classParts, function ($part) {
                    return trim($part) !== 'main';
                });
                $mainClass = implode(' ', $classParts);
                $mainClass = trim($mainClass);
                return $mainClass;
            }
        }

        // Fallback: Demo ana sayfaları için home
        if (str_contains($page, 'demo') && !str_contains($page, 'shop') && !str_contains($page, 'product') && !str_contains($page, 'category') && !str_contains($page, 'about') && !str_contains($page, 'contact')) {
            return 'home';
        }

        return '';
    }

    /**
     * Sayfa için body class'ını döndürür
     */
    private function getBodyClass(string $page): ?string
    {
        // Demo numarasını çıkar
        if (preg_match('/demo(\d+)/', $page, $matches)) {
            $demoNum = (int) $matches[1];
        } elseif (preg_match('/demo(\d+)-/', $page, $matches)) {
            $demoNum = (int) $matches[1];
        } else {
            return null;
        }

        // Özel body class'ları
        $bodyClasses = [
            19 => null, // data-spy kullanıyor
            25 => 'boxed',
        ];

        return $bodyClasses[$demoNum] ?? null;
    }

    /**
     * Sayfa için body attributes'ını döndürür
     */
    private function getBodyAttributes(string $page): ?string
    {
        // Demo numarasını çıkar
        if (preg_match('/demo(\d+)/', $page, $matches)) {
            $demoNum = (int) $matches[1];
        } elseif (preg_match('/demo(\d+)-/', $page, $matches)) {
            $demoNum = (int) $matches[1];
        } else {
            return null;
        }

        // Özel body attributes
        $bodyAttributes = [
            19 => 'data-spy="scroll" data-target="#category-list" data-offset="71"',
        ];

        return $bodyAttributes[$demoNum] ?? null;
    }

    /**
     * Top notice verisini döndürür
     */
    private function getTopNotice(): ?array
    {
        $data = $this->storeSettingService->get('top_notice');

        if (!$data) {
            return null;
        }

        $decoded = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        // Sadece aktifse döndür
        if (!($decoded['is_active'] ?? false)) {
            return null;
        }

        return $decoded;
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
