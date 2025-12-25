---
alwaysApply: true
---

# FORM REFACTORING KURALLARI

## Genel Sorunlar ve Çözümler

### 1. State Yönetimi Karmaşıklığı

**Sorun:**

- Form state (`useForm`) ve local state (`useState`) karışık kullanılıyor
- Submit öncesi bu veriler birleştiriliyor, bu da hata riski yaratıyor

**Çözüm:**

- **Tek kaynak prensibi**: Tüm form verileri `useForm` içinde tutulmalı
- Local state sadece UI state için kullanılmalı (modal açık/kapalı, dropdown açık/kapalı)
- Submit öncesi transformasyon yapılacaksa, bunu `handleSubmit` içinde değil, `setData` ile yapmalı

### 2. Çok Fazla Handler Fonksiyonu

**Sorun:**

- Her işlem için ayrı handler fonksiyonları
- Bu fonksiyonlar component içinde tanımlanıyor, her render'da yeniden oluşturuluyor
- Kod tekrarı çok fazla

**Çözüm:**

- **Generic handler'lar kullan**: `handleAdd`, `handleRemove`, `handleUpdate` gibi
- **Custom hook'lara taşı**: Karmaşık state logic'i hook'lara taşı
- **useCallback kullan**: Handler'ları memoize et

### 3. Component Bölme Eksikliği

**Sorun:**

- Büyük formlar direkt sayfa içinde yazılmış (500+ satır)
- Component'ler çok büyük ve okunması zor

**Çözüm:**

- **Her bölüm ayrı component**: Maksimum 200-300 satır
- **Props interface'leri tanımla**: Her component'in props'u type-safe olmalı

### 4. Import Karmaşıklığı

**Sorun:**

- 60+ satır import
- Kullanılmayan import'lar olabilir

**Çözüm:**

- **Barrel export kullan**
- **Import gruplama**: React, Inertia, UI, Hooks, Types, Utils şeklinde grupla
- **Kullanılmayan import'ları temizle**: ESLint ile kontrol et

### 5. Form Submit Karmaşıklığı

**Sorun:**

- `handleSubmit` içinde çok fazla transformasyon yapılıyor
- Bu transformasyonlar hata riski yaratıyor ve test edilmesi zor

**Çözüm:**

- **Transformasyon'u hook'lara taşı**: Her hook kendi transformasyonunu yapsın
- **Submit öncesi hazırlık**: `handleSubmit` sadece birleştirme yapsın, transformasyon yapmasın
- **Validation ekle**: Submit öncesi validation yap

### 6. Type Safety Sorunları

**Sorun:**

- `@ts-expect-error` kullanımları var
- Dynamic field name'ler type-safe değil

**Çözüm:**

- **Type-safe field access**: `setData` için generic type kullan
- **Type guard'lar**: Runtime type kontrolü için type guard'lar kullan
- **Strict mode**: TypeScript strict mode açık olmalı

### 7. Prop Drilling

**Sorun:**

- Component'lere çok fazla prop geçiliyor
- Props değiştiğinde tüm component'ler etkileniyor

**Çözüm:**

- **Context kullan**: Form state'i context ile paylaş
- **Compound component pattern**: İlgili component'leri birleştir
- **Props object kullan**: Tek bir props object geç, içinde tüm veriler olsun

### 8. Submit Öncesi Validation Eksikliği

**Sorun:**

- Submit öncesi validation yok
- Kullanıcı eksik form ile submit edebiliyor
- Hata mesajları backend'den geliyor, UX kötü

**Çözüm:**

- **Client-side validation**: Zod veya Yup ile validation
- **Submit öncesi kontrol**: `handleSubmit` içinde validation yap
- **Kullanıcı dostu hata mesajları**: Validation hatalarını kullanıcıya göster

## Refactoring Checklist

Bir form sayfasını refactor ederken şu adımları takip et:

1. **State yönetimini düzenle**
    - [ ] Local state'leri form state'e taşı
    - [ ] Tek kaynak prensibi uygula
    - [ ] Submit öncesi transformasyon'u hook'lara taşı

2. **Handler'ları düzenle**
    - [ ] Generic handler'lar oluştur
    - [ ] Custom hook'lara taşı
    - [ ] useCallback ile memoize et

3. **Component'leri böl**
    - [ ] Her bölüm ayrı component
    - [ ] Component maksimum 200-300 satır
    - [ ] Props interface'leri tanımla

4. **Import'ları düzenle**
    - [ ] Barrel export kullan
    - [ ] Import gruplama yap
    - [ ] Kullanılmayan import'ları temizle

5. **Type safety'i iyileştir**
    - [ ] @ts-expect-error kullanımlarını kaldır
    - [ ] Type-safe field access kullan
    - [ ] Type guard'lar ekle

6. **Validation ekle**
    - [ ] Client-side validation
    - [ ] Submit öncesi kontrol
    - [ ] Kullanıcı dostu hata mesajları

7. **Test yaz**
    - [ ] Her component için test
    - [ ] Hook'lar için test
    - [ ] Form submit için test

## Önemli Notlar

- **Her component tek sorumluluğa sahip olmalı**: Bir component sadece bir şey yapmalı
- **State yönetimi merkezi olmalı**: Form state tek kaynak olmalı
- **Hook'lar reusable olmalı**: Hook'lar başka sayfalarda da kullanılabilir olmalı
- **Type safety önemli**: TypeScript'i doğru kullan, any kullanma
- **Test edilebilirlik**: Her component ve hook test edilebilir olmalı
- **Performans**: useCallback, useMemo gibi optimizasyonlar kullan
- **Okunabilirlik**: Kod okunabilir olmalı, yorum gerektirmemeli
