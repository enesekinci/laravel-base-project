# Content Blocks

Content Blocks, sitenizin farklı bölümlerinde kullanabileceğiniz yeniden kullanılabilir içerik parçalarıdır.

## Kullanım

Content Blocks, özellikle şu durumlarda kullanışlıdır:

- **Sayfa içerikleri**: Ana sayfa, hakkımızda, iletişim gibi sayfalarda dinamik içerik
- **Widget'lar**: Sidebar, footer gibi bölümlerde tekrar eden içerikler
- **Banner'lar**: Promosyon banner'ları, duyurular
- **HTML/Blade kodları**: Özel HTML veya Blade template'leri

## Özellikler

- **Kod (Code)**: Her content block'un benzersiz bir kodu vardır. Bu kod ile Blade template'lerinde içeriği çağırabilirsiniz.
- **İçerik (Content)**: HTML, Blade syntax veya düz metin içerebilir.
- **Aktif/Pasif**: İçeriği geçici olarak devre dışı bırakabilirsiniz.

## Blade Template'de Kullanım

```blade
{{-- Content block'u çağırma --}}
@contentblock('home_hero_section')

{{-- Veya eğer yoksa varsayılan içerik göster --}}
@contentblock('home_hero_section', '<div>Varsayılan içerik</div>')
```

## Örnek Kullanım Senaryoları

### 1. Ana Sayfa Hero Bölümü

**Kod**: `home_hero_section`
**İçerik**:
```html
<div class="hero-section">
    <h1>Hoş Geldiniz</h1>
    <p>Modern e-ticaret deneyimi</p>
    <a href="/products" class="btn btn-primary">Alışverişe Başla</a>
</div>
```

### 2. Footer İletişim Bilgileri

**Kod**: `footer_contact`
**İçerik**:
```html
<div class="footer-contact">
    <p>Email: info@example.com</p>
    <p>Telefon: +90 555 123 4567</p>
    <p>Adres: İstanbul, Türkiye</p>
</div>
```

### 3. Promosyon Banner

**Kod**: `promo_banner`
**İçerik**:
```html
<div class="alert alert-info text-center">
    <strong>Özel İndirim!</strong> Tüm ürünlerde %20 indirim. Kupon kodu: SAVE20
</div>
```

## Seeder ile Örnek Veri Ekleme

`ContentBlocksSeeder` ile örnek content block'lar ekleyebilirsiniz:

```bash
php artisan db:seed --class=ContentBlocksSeeder
```

## Notlar

- Content block kodları benzersiz olmalıdır
- Blade syntax kullanırken `@` karakterini `@@` ile escape edin
- İçerik aktif değilse, template'de çağrıldığında hiçbir şey gösterilmez

