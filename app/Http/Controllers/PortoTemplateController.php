<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class PortoTemplateController extends Controller
{
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

        // Önce Blade view'ını kontrol et
        $bladeView = "porto.{$page}";
        if (view()->exists($bladeView)) {
            // Demo CSS'i belirle (demo1, demo2, etc.)
            $demoCss = 'demo1';
            if (preg_match('/demo(\d+)/', $page, $matches)) {
                $demoCss = 'demo' . $matches[1];
            } elseif (preg_match('/demo(\d+)-/', $page, $matches)) {
                $demoCss = 'demo' . $matches[1];
            }

            // Main class'ı belirle - JSON dosyasından oku
            $mainClass = $this->getMainClass($page);

            // Body class ve attributes belirle
            $bodyClass = $this->getBodyClass($page);
            $bodyAttributes = $this->getBodyAttributes($page);

            return response()->view($bladeView, [
                'demoCss' => $demoCss,
                'mainClass' => $mainClass,
                'bodyClass' => $bodyClass,
                'bodyAttributes' => $bodyAttributes,
            ]);
        }

        // Blade view yoksa HTML dosyasını render et (geriye dönük uyumluluk)
        $htmlPath = resource_path("views/porto/{$page}.html");

        if (!File::exists($htmlPath)) {
            abort(404, "Sayfa bulunamadı: {$htmlPath}");
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
}
