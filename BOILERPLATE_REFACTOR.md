# Laravel Base Project Refactor Plan (2026 Edition)

Bu belge, `laravel-base-project` deposunu **1 Ocak 2026** standartlarına çekmek ve AI (Cursor/Vibe Coding) için optimize etmek amacıyla oluşturulmuştur.

## 1. Hedef Teknoloji Yığını (Target Stack)

- **PHP:** 8.5
- **Framework:** Laravel 12.x (Stable)
- **Frontend:** Livewire 3.x (Class-based or Volt)
- **UI Framework:** MaryUI (DaisyUI 5.x + Tailwind CSS 4.x tabanlı)
- **Testing:** Pest PHP 3.x + Laravel Dusk
- **AI Helper:** `.cursorrules` (Strict Mode)

## 2. Temizlik ve Upgrade (Cleanup)

- [ ] `composer.json` dosyasını **Laravel 12** ve **PHP 8.5** gereksinimlerine göre güncelle.
- [ ] Varsa eski Laravel sürümlerinden kalma "deprecated" helper'ları temizle.
- [ ] `vite.config.js` yapılandırmasını Tailwind v4 standartlarına göre kontrol et.
- [ ] Gereksiz JS kütüphanelerini (Alpine.js harici) sil.

## 3. Kurulumlar (Installations)

- [ ] **MaryUI Kurulumu:**
    - `composer require robsontenorio/mary`
    - `php artisan mary:install`
- [ ] **Test Altyapısı:**
    - `composer require pestphp/pest --dev --with-all-dependencies`
    - `php artisan pest:install`
    - `composer require laravel/dusk --dev`

## 4. UI Dönüşümü (Refactoring)

- [ ] **Layout:** `layouts/app.blade.php` dosyasını MaryUI `x-mary-main` yapısına çevir (Sidebar + Navbar).
- [ ] **Auth:** Login/Register sayfalarını MaryUI form componentleri ile yeniden yaz.
- [ ] **Dashboard:** Basit bir dashboard ve "User Profile" sayfasını Livewire component'ine çevir.
- [ ] **Toast:** Global bildirimler için MaryUI `x-mary-toast` entegrasyonunu yap.

## 5. AI Bağlamı (Cursor Rules)

- [ ] Projenin kök dizinine aşağıdaki `.cursorrules` dosyasını ekle:

````markdown
# Laravel 12 + MaryUI Coding Rules

## Tech Stack

- Laravel 12, PHP 8.5, Livewire 3, MaryUI, Pest PHP.

## Vibe Coding Guidelines

1. **Livewire First:** Do not use React/Vue. Use Livewire for all dynamic UI.
2. **MaryUI Components:** Always use `<x-mary-*>` syntax (e.g., `<x-mary-header>`, `<x-mary-input>`).
3. **No Raw CSS:** Avoid writing raw CSS classes if a MaryUI component exists.
4. **Testing:** Every feature MUST have a Pest test (`php artisan make:test FeatureName --pest`).

## 6. Kalite Kontrol

- [ ] php artisan test komutu hatasız çalışmalı.

- [ ] Mobil görünüm (Responsive) kontrol edilmeli.

---

### Dosya 2: `PROJECT_MANAGEMENT_ROADMAP.md`

_(Boilerplate hazırlandıktan sonra PM projesini yapmak için)_

```markdown
# Project Management Tool Roadmap (Planner + GitHub Publisher)

**Vizyon:** Kod yazmayan, sadece JSON plan üreten ve bunu GitHub'a (Issues + Projects V2) işleyen AI destekli Proje Yöneticisi.
**Tarih:** Ocak 2026

## 1. Hazırlık

- [ ] Refactor edilmiş `laravel-base-project`'i `pm-planner` adıyla klonla.
- [ ] Veritabanını (PostgreSQL) hazırla.

## 2. Veri Modeli (Database Schema)

- [ ] **Migration:** `github_accounts` (OAuth tokenları için).
- [ ] **Migration:** `targets` (Org, Repo, ProjectV2 ID, Field Mapping JSON).
- [ ] **Migration:** `templates` (Software, Marketing, Hybrid şablonları).
- [ ] **Migration:** `plan_runs` (AI çıktısı JSON, user input JSON).
- [ ] **Migration:** `plan_items` (Hiyerarşik: Epic > Story > Task).
- [ ] **Migration:** `publish_queue` (GitHub Rate Limit yönetimi için job tablosu).

## 3. Servis Katmanı (Service Layer)

- [ ] **GitHubService.php:**
    - `fetchProjectsV2($org)`: GraphQL.
    - `fetchProjectFields($projectId)`: GraphQL (Field ID mapping için kritik).
    - `createIssue($repo, $data)`: REST API.
    - `addProjectItem($projectId, $contentId)`: GraphQL.
- [ ] **AIPlannerService.php:**
    - OpenAI/Anthropic entegrasyonu.
    - **Scope Lock:** Çıktıyı kesinlikle JSON Schema ile zorla. (Sadece Epic/Story/Task tipleri).

## 4. UI Geliştirme (MaryUI + Livewire)

- [ ] **Setup Wizard:**
    - Step 1: GitHub Connect & Target Selection.
    - Step 2: Template Selection.
    - Step 3: Project Briefing (AI Input).
- [ ] **Plan Preview:**
    - Tree View (Ağaç yapısı) ile planı göster.
    - Edit/Delete/Add node özellikleri.
- [ ] **Dashboard:** Geçmiş planlar ve durumları.

## 5. Yayınlama Motoru (Publisher)

- [ ] **Rate Limiting:** GitHub API limitlerine takılmamak için `Redis` veya `Database` kuyruğu kur.
- [ ] **PublishJob:**
    - Issue oluştur -> DB'yi güncelle -> Project'e ekle -> Custom Field'ları set et.
    - Hata durumunda (Retry policy) mekanizması.

## 6. Test Stratejisi

- [ ] **Mocking:** GitHub API çağrılarını mocklayarak plan oluşturma testleri.
- [ ] **Browser Test:** Kullanıcının Wizard'ı tamamlayıp "Publish" butonuna basma akışı (Dusk).
```
````
