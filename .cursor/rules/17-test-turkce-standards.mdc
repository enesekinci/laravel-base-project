---
alwaysApply: true
---

# TEST TÜRKÇE STANDARTLARI

## Genel Kural

**Tüm test açıklamaları (`it()` fonksiyonları) Türkçe olmalıdır.**

- ✅ Test açıklamaları anlamlı ve açıklayıcı olmalıdır
- ✅ Feature, Unit ve Browser testleri dahil
- ❌ İngilizce test açıklamaları kullanılmamalıdır

## Örnekler

### ✅ İyi - Türkçe Açıklamalar

```php
it('admin için filtrelerle ürün listeler', function () {
    // test kodu
});

it('kategori oluşturur ve veritabanına kaydeder', function () {
    // test kodu
});

it('ürün detayını ilişkileriyle birlikte gösterir', function () {
    // test kodu
});

it('aktif olmayan ürünleri filtreler', function () {
    // test kodu
});
```

### ❌ Kötü - İngilizce Açıklamalar

```php
it('lists posts with filters for admin', function () {
    // test kodu
});

it('creates a category', function () {
    // test kodu
});

it('shows post detail with relations', function () {
    // test kodu
});
```

## Açıklama Formatı

Test açıklamaları şu formatta olmalıdır:

- **Özne + Fiil + Nesne**: "admin yazı listeler", "sistem kategori oluşturur"
- **Fiil + Nesne**: "yazı oluşturur", "sayfa günceller"
- **Durum belirten**: "yayınlanmış yazıları gösterir", "silinmiş kayıtları filtreler"

## Kapsam

Bu kural şu test dosyaları için geçerlidir:

- `tests/Feature/**/*.php` - Tüm Feature testleri
- `tests/Unit/**/*.php` - Tüm Unit testleri
- `tests/Browser/**/*.php` - Tüm Browser testleri

## Uygulama

Yeni test yazarken veya mevcut testleri güncellerken:

1. `it()` fonksiyonunun ilk parametresi (açıklama) Türkçe olmalıdır
2. Açıklama, testin ne yaptığını net bir şekilde ifade etmelidir
3. Gereksiz kelimeler kullanılmamalıdır
4. Teknik terimler Türkçe karşılıklarıyla yazılmalıdır (örn: "ürün" → "product" değil)

## Özel Durumlar

- API endpoint isimleri İngilizce kalabilir: `it('GET /api/posts endpoint\'i çalışır', ...)`
- Model/Class isimleri İngilizce kalabilir: `it('Post model\'i doğru şekilde kaydedilir', ...)`
- Teknik terimler Türkçeleştirilemezse İngilizce kalabilir: `it('DataTable doğru şekilde render edilir', ...)`

## Kontrol Listesi

Yeni bir test yazarken veya mevcut testi güncellerken:

- [ ] Test açıklaması Türkçe mi?
- [ ] Açıklama anlamlı ve açıklayıcı mı?
- [ ] Gereksiz kelimeler var mı?
- [ ] Teknik terimler uygun şekilde kullanılmış mı?
