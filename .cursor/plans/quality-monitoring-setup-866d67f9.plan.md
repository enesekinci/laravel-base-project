<!-- 866d67f9-a160-47fb-8391-4726de6dcf29 bfa7d57d-16e6-41db-9ece-961215e15ca1 -->
# Commit ve Base Branch Hazırlığı

## 1. Mevcut Çalışmayı Commit Et

- `git status` ile değişiklikleri gözden geçir.
- Gerekirse `git add -p` ile seçici stage yap.
- Anlamlı bir mesajla commit et.

## 2. Yeni Branch Aç

- `git checkout -b base-cleanup`
- Bu branch ileride fork edilecek.

## 3. Admin Dashboard Temizliği

- Dashboard'da sadece genel dashboard ekranı ve component showcase kalsın.
- Özel/feature-specific sayfaları kaldır.
- Route, controller, view ve asset temizliğini yap.

## 4. Yeni Base Branch'i Kontrol

- `php artisan test` veya gerekli minimum testleri çalıştır.
- `npm run build` gibi frontend build gerekiyorsa yap.
- `git status` ile temiz olduğundan emin ol.

## 5. Yeni Repo Hazırlığı

- Branch'i push et (`git push origin base-cleanup`).
- Bu branch üzerinden yeni repo fork planı dokümante et.

## 6. Son Durumu Paylaş

- Yapılanları ve kalan adımları kullanıcıya özetle.

### To-dos

- [ ] Laravel Pint config dosyası oluştur (pint.json) ve projeyi formatla
- [ ] Larastan paketini kur ve phpstan.neon config dosyası oluştur (Level 8)
- [ ] Request Logging Middleware oluştur ve log channel ekle
- [ ] Slow Request Alert sistemi (500ms threshold, mail job, mailable, template)
- [ ] 5xx Error Alert sistemi (mail job, mailable, template, rate limiting)
- [ ] Slow SQL logging enhancement (configurable threshold, log channel)
- [ ] Admin Action Log sistemi (model, migration, middleware)
- [ ] Log channels separation (requests, slow-sql, security, admin-actions, errors)
- [ ] Security Headers Middleware (X-Frame-Options, CSP, HSTS, vb.)
- [ ] CORS strict configuration (config/cors.php)
- [ ] HTTPS Redirect Middleware (production için)
- [ ] Password Rehash Check Middleware
- [ ] Mass Assignment Audit (Larastan ile kontrol, eksikleri düzelt)
- [ ] Auth routes için rate limiting ekle (brute force koruması)
- [ ] preventLazyLoading production için aktif et
- [ ] Health check endpoints (/health/detailed - DB, Redis, Queue, Disk, Memory)
- [ ] API Response Macro (uniform JSON response formatı)
- [ ] Feature Flags sistemi (config/features.php)
- [ ] Payment Callback Logging Middleware (detaylı log, sensitive data masking)
- [ ] Fraud Limits enhancement (IP, kart, pattern detection)