<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ContentBlock;
use Illuminate\Database\Seeder;

class ContentBlocksSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'key' => 'home_hero_section',
                'name' => 'Ana Sayfa Hero Bölümü',
                'content' => '<div class="hero-section text-center py-5">
    <h1 class="display-4">Hoş Geldiniz</h1>
    <p class="lead">Modern e-ticaret deneyimi ile ihtiyacınız olan her şeyi bulun</p>
    <a href="/products" class="btn btn-primary btn-lg mt-3">Alışverişe Başla</a>
</div>',
                'is_active' => true,
            ],
            [
                'key' => 'footer_contact',
                'name' => 'Footer İletişim Bilgileri',
                'content' => '<div class="footer-contact">
    <h5>İletişim</h5>
    <p><i class="feather feather-mail"></i> Email: info@example.com</p>
    <p><i class="feather feather-phone"></i> Telefon: +90 555 123 4567</p>
    <p><i class="feather feather-map-pin"></i> Adres: İstanbul, Türkiye</p>
</div>',
                'is_active' => true,
            ],
            [
                'key' => 'promo_banner',
                'name' => 'Promosyon Banner',
                'content' => '<div class="alert alert-info text-center mb-0">
    <strong>🎉 Özel İndirim!</strong> Tüm ürünlerde %20 indirim. Kupon kodu: <strong>SAVE20</strong>
</div>',
                'is_active' => true,
            ],
            [
                'key' => 'about_us_intro',
                'name' => 'Hakkımızda Giriş',
                'content' => '<div class="about-intro">
    <h2>Hakkımızda</h2>
    <p>Fast Commerce olarak, müşterilerimize en iyi alışveriş deneyimini sunmak için çalışıyoruz. 
    Geniş ürün yelpazemiz ve kaliteli hizmet anlayışımızla yanınızdayız.</p>
</div>',
                'is_active' => true,
            ],
            [
                'key' => 'shipping_info',
                'name' => 'Kargo Bilgileri',
                'content' => '<div class="shipping-info">
    <h5>Kargo Bilgileri</h5>
    <ul>
        <li>Ücretsiz kargo 500 TL ve üzeri siparişlerde</li>
        <li>Kargo süresi: 1-3 iş günü</li>
        <li>Kapıda ödeme seçeneği mevcuttur</li>
    </ul>
</div>',
                'is_active' => true,
            ],
        ];

        foreach ($blocks as $block) {
            ContentBlock::updateOrCreate(
                ['key' => $block['key']],
                $block
            );
        }
    }
}
