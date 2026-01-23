# FocusFlow - Kapsamlı Üretkenlik Uygulaması

## Proje Özeti
FocusFlow, kullanıcıların görevlerini yönetmelerine, zaman odaklı çalışmalarına ve kısa/uzun vadeli hedeflerini takip etmelerine yardımcı olan, React tabanlı, modern bir web uygulamasıdır.

---

## Teknik Gereksinimler

### Teknoloji Stack
- **Frontend**: React (useState, useEffect, useContext hooks)
- **Styling**: Tailwind CSS
- **İkonlar**: Lucide React
- **Veri Saklama**: window.storage API (kalıcı depolama)
- **Bildirimler**: Web Notifications API

### Veri Yapısı
Tüm veriler `window.storage` kullanılarak JSON formatında saklanmalıdır:
- `todos` - Görev listesi
- `pomodoroSettings` - Pomodoro ayarları
- `pomodoroHistory` - Tamamlanan pomodoro seansları
- `goals` - Hedefler (günlük, haftalık, aylık, yıllık)
- `userSettings` - Kullanıcı tercihleri
- `statistics` - İstatistik verileri

---

## Kullanıcı Hikayeleri

### 1. Görev Yönetimi (Todo List)

**Kullanıcı olarak:**
- Hızlı bir şekilde yeni görev ekleyebilmeliyim
- Her göreve öncelik seviyesi atayabilmeliyim (Düşük, Orta, Yüksek, Kritik)
- Görevleri kategorilere ayırabilmeliyim (İş, Kişisel, Sağlık, Alışveriş, vb.)
- Büyük görevleri alt görevlere bölebilmeliyim
- Görevleri tamamlandı olarak işaretleyebilmeliyim
- Tamamlanan görevleri görüntüleyebilmeliyim veya gizleyebilmeliyim
- Görevleri düzenleyebilmeli veya silebilmeliyim
- Görevleri sürükle-bırak ile yeniden sıralayabilmeliyim
- Son tarih (deadline) ekleyebilmeliyim
- Görevleri filtreleyebilmeliyim (kategori, öncelik, tarih)

**Tekrarlayan Görevler:**
- Günlük, haftalık, aylık tekrar seçenekleri
- Özel tekrar sıklığı (her 3 günde bir, vb.)
- Tekrarlayan görevler otomatik olarak yenilensin

**Veri Modeli:**
```javascript
{
  id: "unique-id",
  title: "Görev başlığı",
  description: "Detaylı açıklama",
  category: "İş",
  priority: "Yüksek", // Düşük, Orta, Yüksek, Kritik
  completed: false,
  createdAt: "2025-01-21T10:00:00Z",
  deadline: "2025-01-25T18:00:00Z",
  subtasks: [
    { id: "sub-1", title: "Alt görev 1", completed: false }
  ],
  recurring: {
    enabled: true,
    frequency: "daily", // daily, weekly, monthly, custom
    interval: 1,
    lastCompleted: "2025-01-21T10:00:00Z"
  }
}
```

---

### 2. Pomodoro Zamanlayıcı

**Kullanıcı olarak:**
- Pomodoro seansı başlatabilmeliyim (varsayılan 25 dakika)
- Mola süresini başlatabilmeliyim (varsayılan 5 dakika)
- Uzun mola seçeneği olmalı (4 pomodoro sonrası 15-30 dakika)
- Zamanlayıcıyı duraklatıp devam ettirebilmeliyim
- Zamanlayıcıyı sıfırlayabilmeliyim
- Pomodoro ve mola sürelerini özelleştirebilmeliyim
- Süre bittiğinde sesli ve görsel bildirim almalıyım
- Arka planda çalışırken bile bildirim almalıyım
- Hangi görev için çalıştığımı seçebilmeliyim
- Tamamlanan pomodoro sayısını görebilmeliyim

**Pomodoro Geçmişi:**
- Günlük tamamlanan pomodoro sayısı
- Hangi görevler için çalışıldığı
- Toplam odaklanma süresi
- Haftalık/aylık trendler

**Ayarlar:**
```javascript
{
  workDuration: 25, // dakika
  shortBreakDuration: 5,
  longBreakDuration: 15,
  pomodorosUntilLongBreak: 4,
  autoStartBreaks: false,
  autoStartPomodoros: false,
  soundEnabled: true,
  notificationEnabled: true,
  soundVolume: 0.7
}
```

**Pomodoro Geçmiş Modeli:**
```javascript
{
  id: "unique-id",
  taskId: "task-id",
  taskTitle: "Görev adı",
  startTime: "2025-01-21T10:00:00Z",
  endTime: "2025-01-21T10:25:00Z",
  duration: 25, // dakika
  completed: true,
  type: "work" // work, short-break, long-break
}
```

---

### 3. Hatırlatıcılar (Reminders)

**Kullanıcı olarak:**
- Belirli bir saat için hatırlatıcı oluşturabilmeliyim
- Hatırlatıcıya not ekleyebilmeliyim
- Tekrarlayan hatırlatıcılar ayarlayabilmeliyim
- Hatırlatıcıları kategorize edebilmeliyim
- Öncelik seviyesi atayabilmeliyim
- Hatırlatıcı geldiğinde browser bildirimi almalıyım
- Hatırlatıcıyı erteleyebilmeliyim (5, 10, 30 dakika)
- Yaklaşan hatırlatıcıları görebilmeliyim
- Geçmiş hatırlatıcıları görüntüleyebilmeliyim

**Veri Modeli:**
```javascript
{
  id: "unique-id",
  title: "Hatırlatıcı başlığı",
  description: "Detaylı not",
  datetime: "2025-01-21T14:30:00Z",
  priority: "Orta",
  category: "Kişisel",
  recurring: {
    enabled: false,
    frequency: "daily"
  },
  completed: false,
  snoozedUntil: null
}
```

---

### 4. Hedef Yönetimi (Goals)

**Kullanıcı olarak:**
- Farklı zaman dilimleri için hedefler koyabilmeliyim:
  - **Günlük Hedefler**: Bugün tamamlanması gereken görevler
  - **Haftalık Hedefler**: Bu hafta ulaşılacak hedefler
  - **Aylık Hedefler**: Bu ay gerçekleştirilecek büyük işler
  - **Yıllık Hedefler**: Uzun vadeli hayaller ve kilometre taşları

**Her hedef için:**
- Başlık ve detaylı açıklama ekleyebilmeliyim
- İlerleme yüzdesi görebilmeliyim
- Alt hedeflere bölebilmeliyim
- Hedef tarih belirleyebilmeliyim
- Tamamlanma durumunu işaretleyebilmeliyim
- Notlar ekleyebilmeliyim

**Görselleştirme:**
- İlerleme çubukları (progress bars)
- Dairesel ilerleme göstergeleri
- Haftalık hedef tamamlanma oranı
- Aylık başarı yüzdesi

**Veri Modeli:**
```javascript
{
  id: "unique-id",
  title: "Hedef başlığı",
  description: "Detaylı açıklama",
  type: "daily", // daily, weekly, monthly, yearly
  progress: 60, // 0-100
  startDate: "2025-01-21",
  targetDate: "2025-01-27",
  subGoals: [
    {
      id: "sub-1",
      title: "Alt hedef",
      completed: false
    }
  ],
  completed: false,
  notes: "Ek notlar"
}
```

---

### 5. Dashboard ve İstatistikler

**Kullanıcı olarak:**
- Genel bir bakış paneli görebilmeliyim:
  - Bugünkü görevler
  - Yaklaşan hatırlatıcılar
  - Aktif hedefler
  - Bugünkü pomodoro sayısı
  
**İstatistikler:**
- Tamamlanan görev sayısı (günlük, haftalık, aylık)
- Toplam odaklanma süresi
- En verimli günler/saatler
- Kategori bazlı görev dağılımı (pasta grafik)
- Haftalık üretkenlik trendi (çizgi grafik)
- Streak (kesintisiz gün sayısı)

**Motivasyon Özellikleri:**
- Başarı rozetleri:
  - "İlk 10 Görev" - 10 görev tamamla
  - "Pomodoro Ustası" - 50 pomodoro tamamla
  - "7 Günlük Streak" - 7 gün üst üste görev tamamla
  - "Hedef Avcısı" - 5 hedef tamamla
- Günlük motivasyon mesajları
- Haftalık özet raporu

---

### 6. Kullanıcı Arayüzü Tasarımı

**Ana Ekran Bileşenleri:**

1. **Yan Panel (Sidebar):**
   - Dashboard
   - Görevlerim
   - Pomodoro
   - Hatırlatıcılar
   - Hedefler
   - İstatistikler
   - Ayarlar

2. **Görevler Sayfası:**
   - Hızlı ekleme input alanı (üstte)
   - Filtre ve sıralama seçenekleri
   - Kategori sekmeleri
   - Görev kartları (checkbox, başlık, öncelik etiketi, tarih, eylem butonları)
   - Tamamlanan görevler bölümü (接olabilir)

3. **Pomodoro Sayfası:**
   - Büyük dairesel zamanlayıcı göstergesi
   - Başlat/Duraklat/Sıfırla butonları
   - Aktif görev seçimi
   - Bugünkü pomodoro sayacı
   - Geçmiş seanslar listesi
   - Ayarlar paneli

4. **Hedefler Sayfası:**
   - Sekme sistemi (Günlük, Haftalık, Aylık, Yıllık)
   - Her sekme için:
     - İlerleme özeti
     - Hedef kartları (başlık, ilerleme çubuğu, tarih)
     - Yeni hedef ekleme butonu

5. **İstatistikler Sayfası:**
   - Özet kartlar (bugün, bu hafta, bu ay)
   - Grafikler (Recharts kullanarak)
   - Başarı rozetleri galeri
   - Streak göstergesi

**Renk Sistemi:**
- **Öncelik Renkleri:**
  - Düşük: Yeşil (#10B981)
  - Orta: Sarı (#F59E0B)
  - Yüksek: Turuncu (#F97316)
  - Kritik: Kırmızı (#EF4444)

- **Kategori Renkleri:**
  - İş: Mavi (#3B82F6)
  - Kişisel: Mor (#8B5CF6)
  - Sağlık: Yeşil (#10B981)
  - Alışveriş: Pembe (#EC4899)

**Responsive Tasarım:**
- Desktop: Yan panel + ana içerik
- Tablet: Daraltılabilir yan panel
- Mobil: Alt navigasyon çubuğu

---

### 7. Ayarlar ve Özelleştirme

**Kullanıcı olarak:**
- Tema seçimi (Açık/Koyu)
- Varsayılan kategori ayarlama
- Bildirim tercihlerini düzenleme
- Pomodoro sürelerini özelleştirme
- Ses efektlerini açma/kapama
- Veri yedekleme (JSON export)
- Veriyi geri yükleme (JSON import)
- Tüm verileri sıfırlama

---

## Geliştirme Aşamaları

### Faz 1: Temel Yapı
1. React proje kurulumu ve sayfa yapısı
2. Tailwind CSS entegrasyonu
3. Routing sistemi (React Router - isteğe bağlı)
4. window.storage entegrasyonu
5. Tema değiştirme sistemi

### Faz 2: Görev Yönetimi
1. Görev ekleme/silme/düzenleme
2. Tamamlanma durumu toggle
3. Kategori ve öncelik sistemi
4. Filtreleme ve sıralama
5. Tekrarlayan görevler

### Faz 3: Pomodoro
1. Zamanlayıcı mekanizması
2. Başlat/Duraklat/Sıfırla fonksiyonları
3. Bildirim sistemi
4. Ayarlar paneli
5. Geçmiş kayıtları

### Faz 4: Hatırlatıcılar
1. Hatırlatıcı oluşturma
2. Zamanlama sistemi
3. Browser bildirimleri
4. Erteleme fonksiyonu

### Faz 5: Hedefler
1. Hedef oluşturma (4 tip)
2. İlerleme takibi
3. Alt hedefler
4. Görselleştirme

### Faz 6: İstatistikler ve Dashboard
1. Veri toplama ve hesaplama
2. Grafikler (Recharts)
3. Başarı rozetleri
4. Dashboard özet kartları

### Faz 7: İyileştirmeler
1. Drag-drop ile görev sıralama
2. Veri export/import
3. Performans optimizasyonu
4. Mobil responsive geliştirmeler

---

## Örnek Kod Yapısı

```
/src
  /components
    /Dashboard
      - DashboardOverview.jsx
      - QuickStats.jsx
    /Todos
      - TodoList.jsx
      - TodoItem.jsx
      - TodoForm.jsx
      - TodoFilters.jsx
    /Pomodoro
      - PomodoroTimer.jsx
      - PomodoroSettings.jsx
      - PomodoroHistory.jsx
    /Reminders
      - ReminderList.jsx
      - ReminderForm.jsx
    /Goals
      - GoalsList.jsx
      - GoalCard.jsx
      - GoalForm.jsx
    /Statistics
      - StatsOverview.jsx
      - ChartsSection.jsx
      - AchievementBadges.jsx
    /Layout
      - Sidebar.jsx
      - Header.jsx
      - ThemeToggle.jsx
    /Common
      - Button.jsx
      - Modal.jsx
      - ProgressBar.jsx
  /contexts
    - AppContext.jsx
    - ThemeContext.jsx
  /hooks
    - useLocalStorage.jsx
    - useNotification.jsx
    - usePomodoro.jsx
  /utils
    - storage.js
    - dateHelpers.js
    - notifications.js
  App.jsx
  main.jsx
```

---

## Önemli Notlar

### Veri Saklama
- **ASLA** localStorage veya sessionStorage kullanma
- **SADECE** `window.storage` API'sini kullan
- Tüm veriler JSON formatında saklanmalı
- Her veri değişikliğinde storage'a kaydet

### Bildirimler
- Browser bildirim izni iste
- Pomodoro süresi bittiğinde bildir
- Hatırlatıcı zamanı geldiğinde bildir
- Sesli bildirim için Audio API kullan

### Performans
- Büyük listeler için sanal scroll düşün
- Gereksiz re-render'ları önle (React.memo, useMemo)
- Debounce kullan (arama, filtre işlemlerinde)

### Kullanıcı Deneyimi
- Loading state'leri göster
- Başarılı işlemler için toast bildirimleri
- Silme işlemlerinde onay iste
- Boş state'ler için anlamlı mesajlar

---

## Başarı Kriterleri

Uygulama şu kriterleri karşılamalı:
- ✅ Tüm görev işlemleri (CRUD) çalışıyor
- ✅ Pomodoro zamanlayıcı doğru çalışıyor ve bildirim gönderiyor
- ✅ Hatırlatıcılar zamanında tetikleniyor
- ✅ Hedefler için ilerleme takibi doğru hesaplanıyor
- ✅ İstatistikler anlamlı ve görsel olarak çekici
- ✅ Veriler kalıcı olarak saklanıyor
- ✅ Responsive tasarım tüm cihazlarda çalışıyor
- ✅ Tema değiştirme sorunsuz çalışıyor
- ✅ Kullanıcı arayüzü sezgisel ve kullanımı kolay

---

## Gelecek Özellikler (İsteğe Bağlı)

- 📱 PWA (Progressive Web App) desteği
- 🌐 Dil desteği (i18n)
- 🔄 Senkronizasyon (birden fazla cihaz)
- 👥 Paylaşılan görevler/hedefler
- 📊 Gelişmiş analitik raporlar
- 🎨 Tema özelleştirme
- 🔔 Akıllı bildirimler (makine öğrenimi ile)
- 📧 Email özet raporları
- 🏆 Gamification özellikleri (XP, seviye sistemi)

---

Bu dokümandaki tüm bilgileri kullanarak, tam işlevsel bir üretkenlik uygulaması geliştirebilirsiniz. Her özellik detaylı olarak açıklanmış ve veri modelleri verilmiştir.