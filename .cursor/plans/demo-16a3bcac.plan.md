<!-- 16a3bcac-32f2-4b93-abef-44f2361dd718 2af3c7db-74eb-4677-b544-d6a52f5adbd5 -->
# Demo1 Blade Dinamik Giydirme Planı

## 1. Veri Kaynaklarını Netleştir

- `App\Providers\AppServiceProvider` veya özel composerlarda `$headerMenu`, `$footerMenu`, `$footerSettings`, `$siteSettings`, kategori listeleri için mevcut/veri modellerini incele.
- Eksik kaynaklar için ilgili modeller/service'ler belirle ve paylaşılacak DTO yapısını tanımla.

## 2. View Composer / Controller Beslemelerini Düzenle

- `resources/views/porto/demo1/*.blade.php` dosyalarını besleyen route/controller/composer kombinasyonlarını tespit et.
- Tekrarlayan veri (header/footer, kategori menüleri, sidebar içerikleri) için merkezi composer/hizmet oluştur.

## 3. Blade Şablonlarının Dinamik Alanlarını Tamamla

- Listelenen tüm Blade dosyalarında (header, footer, index, product, shop, cart, checkout vb.) statik kısımları veri kaynakları ile eşleştir.
- Eksik conditional kontrolleri ve döngüleri (`@foreach($headerMenu ?? [] as $item)` vb.) ekle; URL, isim, görsel alanlarını güvenli şekilde bağla.
- Gereken yerlerde `@lang`/`__()` kullanarak metinleri yerelleştirilebilir hale getir.

## 4. Yardımcı Fonksiyon / Partial İyileştirmeleri

- Tekrarlayan markup kuyruğu için helper veya partial (ör. ürün kartı, breadcrumb) oluşturmayı değerlendir.
- `render_menu_items`, `category_select_options` benzeri yardımcıların eksik parametrelerini güncelle.

## 5. Test ve Doğrulama

- Örnek veri ile tüm sayfaları yükleyip menü, footer, ürün-listesi, form alanlarının doğru beslendiğini doğrula.
- Hataları Laravel loglarında kontrol et; gerekirse Pest ile temel view composer testi ekle.

### To-dos

- [ ] Composer ve veri kaynaklarını incele
- [ ] Gerekli view composerları güncelle
- [ ] Tüm demo1 Blade alanlarını veriyle doldur
- [ ] Sayfaları manuel/test ile doğrula