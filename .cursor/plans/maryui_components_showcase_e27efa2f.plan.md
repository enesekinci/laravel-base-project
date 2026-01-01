---
name: MaryUI Components Showcase
overview: MaryUI dokümantasyonundaki tüm componentleri accordion yapısıyla kategorilere ayırarak components sayfasına ekleyeceğiz. Livewire component kullanarak state yönetimi sağlayacağız.
todos:
  - id: create_livewire_component
    content: Livewire component oluştur (app/Livewire/Admin/ComponentsShowcase.php) - tüm component state'leri için property'ler
    status: completed
  - id: create_view_file
    content: View dosyası oluştur (resources/views/livewire/admin/components-showcase.blade.php) - accordion yapısıyla kategoriler
    status: completed
    dependencies:
      - create_livewire_component
  - id: add_forms_components
    content: Forms Components kategorisini ekle (Input, Textarea, Select, Checkbox, Toggle, Radio, Group, Color Picker, Choices, DateTime, File Upload, Image Library, Range Slider, Tags)
    status: completed
    dependencies:
      - create_view_file
  - id: add_list_data_components
    content: List Data Components kategorisini ekle (Table, List Item)
    status: completed
    dependencies:
      - create_view_file
  - id: add_menus_components
    content: Menus Components kategorisini ekle (Menu, Dropdown)
    status: completed
    dependencies:
      - create_view_file
  - id: add_dialogs_components
    content: Dialogs Components kategorisini ekle (Modal, Toast, Drawer)
    status: completed
    dependencies:
      - create_view_file
  - id: add_ui_components
    content: UI Components kategorisini ekle (Alert, Avatar, Breadcrumbs, Button, Badge, Card, Carousel, Collapse, Header, Icon, Kbd, Pin, Popover, Progress, Rating, Spotlight, Statistic, Steps, Swap, Timeline, Tabs, Theme Toggle)
    status: completed
    dependencies:
      - create_view_file
  - id: add_third_party_components
    content: Third-party Components kategorisini ekle (Choices advanced, Calendar, Chart, Code, Date Picker, Diff, Image Gallery, Markdown Editor, Rich Text Editor, Signature) - gerekli kütüphaneleri head'e ekle
    status: completed
    dependencies:
      - create_view_file
  - id: update_controller
    content: ComponentController'ı Livewire component render edecek şekilde güncelle
    status: completed
    dependencies:
      - create_livewire_component
  - id: update_route
    content: Route'u Livewire component kullanacak şekilde güncelle (gerekirse)
    status: completed
    dependencies:
      - update_controller
---

# MaryUI Components Showcase Planı

## Genel Yapı

Mevcut `resources/views/admin/components.blade.php` sayfasını MaryUI componentleriyle güncelleyeceğiz. Sayfa accordion yapısıyla kategorilere ayrılacak ve her component için örnek kullanım gösterilecek.

## 1. Livewire Component Oluşturma

**Dosya:** `app/Livewire/Admin/ComponentsShowcase.php`

- Component state'leri için property'ler (modal, drawer, toast, vb.)
- Form component'leri için örnek data
- Third-party component'ler için gerekli state'ler

## 2. View Dosyası Güncelleme

**Dosya:** `resources/views/livewire/admin/components-showcase.blade.php`Accordion yapısıyla kategoriler:

### Kategori 1: Forms Components

- Input (temel, icon, clearable, prefix/suffix, inline)
- Textarea
- Select (temel, grouped, disabled options)
- Checkbox
- Toggle
- Radio
- Group
- Color Picker
- Choices (single, multiple, searchable)
- DateTime
- File Upload (single, multiple, image preview, crop)
- Image Library
- Range Slider
- Tags

### Kategori 2: List Data Components

- Table (temel, sortable, actions)
- List Item

### Kategori 3: Menus Components

- Menu (temel, submenu, active state)
- Dropdown (temel, custom trigger, right alignment)

### Kategori 4: Dialogs Components

- Modal (temel, form içeren, persistent)
- Toast (örnekler)
- Drawer (positions)

### Kategori 5: UI Components

- Alert
- Avatar
- Breadcrumbs
- Button (temel, icon, tooltip, badge, responsive)
- Badge
- Card
- Carousel
- Collapse / Accordion
- Header
- Icon
- Kbd
- Pin
- Popover
- Progress
- Rating
- Spotlight
- Statistic
- Steps
- Swap
- Timeline
- Tabs
- Theme Toggle

### Kategori 6: Third-party Components

- Choices (advanced)
- Calendar
- Chart
- Code
- Date Picker
- Diff
- Image Gallery
- Markdown Editor
- Rich Text Editor
- Signature

## 3. Third-party Kütüphaneler

**Dosya:** `resources/views/livewire/admin/components-showcase.blade.php` (head section)Gerekli kütüphaneler:

- Cropper.js (Image Library, File Upload crop için)
- Sortable.js (Image Library için)
- Vanilla Calendar (Calendar için)
- Chart.js (Chart için)
- Ace Editor (Code için)
- Flatpickr (Date Picker için)
- diff2html (Diff için)
- PhotoSwipe (Image Gallery için)
- EasyMDE (Markdown Editor için)
- TinyMCE (Rich Text Editor için)
- Signature Pad (Signature için)

## 4. Controller Güncelleme

**Dosya:** `app/Http/Controllers/Admin/ComponentController.php`Livewire component'i render edecek şekilde güncellenecek.

## 5. Route Kontrolü

**Dosya:** `routes/web.php`Route zaten mevcut, değişiklik gerekmez.

## Önemli Notlar

- Her component için dokümantasyondan örnek kullanım eklenecek
- Third-party component'ler için setup talimatları eklenecek
- Accordion yapısı sayfayı daha organize hale getirecek
- Livewire component state yönetimi için gerekli property'ler eklenecek