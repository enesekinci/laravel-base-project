---
alwaysApply: true
---

# REACT / FORM RULES

## 1. Dosya Yapısı ve Bileşen Bölme

- Büyük formları TEK dosyada yazma.
- Karmaşık formlar mantıklı parçalara bölünmelidir:
    - GeneralSection (temel alanlar: isim, slug, fiyat vb.)
    - CategoriesSection (kategori seçimi)
    - AttributesSection
    - VariationsSection
    - DataTable (tablo verileri)
    - MediaSection
    - SeoSection
- Parent component sadece şu işleri yapar:
    - useForm / form state yönetimi
    - submit
    - alt bileşenlere props geçme
- Bir bileşen 200 satırı geçiyorsa Cursor onu parçalamalı.

## 2. Form State Tek Kaynak Kuralı

- Aynı veriyi hem local state'te hem form state'te TUTMA.
- Eğer UI'de seçim yapılıyorsa (kategori, tag vb.) submit'ten ÖNCE:
    - formData.selection_ids = selectedIds
    - Bunu açıkça handleSubmit içinde yap.
- Cursor şu ifadeyi asla atlamayacak:
    - "Submit öncesi tüm türetilmiş state'ler form state'e kopyalanır."

## 3. Türetilmiş Veriyi Senkronize Etme

- Kaynak veri → türetilmiş veri gibi ilişkiler varsa (örn: variations → variants):
    - Değişiklik anında yeniden üret
    - Ama var olan türetilmiş verinin user-input alanlarını (fiyat, stok, sku vb.) SİLME.
    - Cursor önce mevcut türetilmiş verileri index'lerine veya stable id'lerine göre eşleştirmeyi denemeli.
- "Kaynak değişti → tüm türetilmiş veriyi yeniden oluştur" yaklaşımını KULLANMA.

## 4. Submit Butonları

- Birden fazla submit butonu varsa:
    - Sadece biri `type="submit"` olur.
    - Diğerleri `type="button"` olur ve form state'e yönlendirici alan ekler (ör: redirect: 'index').
- Aynı formda iki tane aynı submit'i asla üretme.

## 5. Upload / Fetch Yerleşimi

- UI component'i içinde doğrudan `fetch(...)` kullanma.
- Upload işlemleri ayrı bir yardımcı fonksiyonda / hook'ta olmalı:
    - `useUploadMedia.ts` veya `uploadFile(file)` gibi.
- DOM'dan (`document.querySelector(...)`) CSRF çekme işlemini UI içine koyma; bunu helper'a koy.

## 6. Tip Güvenliği

- Gönderilen payload ile TypeScript interface'leri birebir olmalı.
- Ek alan interface'te yoksa ya interface'e ekle ya da payload'a koyma.
- Cursor şu kontrolü yapmalı:
    - "TS tipi içinde olmayan alan post ediliyor mu?" → evet ise uyar ve tip ekle.

## 7. Seçim Bileşenleri

- Seçim bileşenleri (kategori, tag, multi-select vb.) ayrı state tutuyorsa:
    - onChange → hem local state'i hem de form state'i güncelle.
    - Yalnızca local state'i güncelleyip formu boş bırakma.
- Çok seviyeli hiyerarşik veri varsa, düz listeye çevirme fonksiyonunu (flatten) `useMemo` ile sarmala.

## 8. Slug Otomasyonu

- name/title değişince slug otomatik üretilir.
- Kullanıcı slug alanını elle değiştirdiyse otomatik güncellemeyi durdur.
- Bu mantığı küçük bir hook'a çıkar: `useAutoSlug(name, isManuallyEdited)`.

## 9. Tablo / Liste Bileşenleri

- Tablo satırlarındaki input'ları controlled yap.
- Satırların key'i index olmasın; mümkünse veriden üretilen stabil bir key kullan.
- Tablo component'i kendi içinde sıralama / edit işlemini yapabilmeli, parent sadece dizi alıp dizi dönmeli.

## 10. Media / Galeri

- Media eklerken her öğeye sort_order ata.
- File nesnesi + preview birlikte saklanıyorsa submit öncesi sadece gereken alanları payload'a koy.
- Cursor şunu yapmalı:
    - UI state: {file, preview, sort_order}
    - Submit payload: {file, sort_order}

## 11. Yorum / Yarım Özellik Yazmama

- "Choose file" gibi butonlar eklenirse mutlaka handler'ı da yaz.
- Tamamlanmamış buton ekleme. Eğer endpoint yoksa butonu disable et ve yorum ekle:
    - `// TODO: implement file picker`

## 12. Performans / Okunabilirlik

- Render içinde IIFE (`(() => { ... })()`) kullanma.
- Büyük hesaplamaları `useMemo` içine al.
- Inline anonim fonksiyonları mümkün olduğunca component dışına çıkar.

## 13. Genel Validasyon

- Submit'te şu sırayla kontrol et:
    1. Zorunlu seçimler yapılmış mı? (category_ids, tag_ids vb. dolu mu)
    2. En az bir media var mı? (proje gerektiriyorsa)
    3. Türetilmiş veriler oluşturulmuşsa, zorunlu alanlar dolu mu
- Eksikse formu göndermeden önce kullanıcıya hata göster.

## 14. Backend Uyum Kuralı

- Laravel / Inertia kullanan projelerde Cursor şu sırayı bozmasın:
    - useForm → setData → post(route(...))
- post etmeden önce türetilmiş alanları **DAİMA** setData ile forma yaz.
