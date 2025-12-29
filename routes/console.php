<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// ============================================================================
// SCHEDULER - Günlük, Saatlik ve Diğer Zamanlanmış Görevler
// ============================================================================
// Bu dosya Laravel'in task scheduler'ını yapılandırır.
// Production'da cron job olarak çalıştırılmalı: * * * * * php artisan schedule:run

// ----------------------------------------------------------------------------
// GÜNLÜK İŞLER
// ----------------------------------------------------------------------------

// Eski log tablolarını temizleme (ileride implement edilecek)
// Schedule::command('logs:clean')->daily()->at('02:00');

// Soft delete edilen kayıtları X gün sonra hard delete etme (opsiyonel)
// Schedule::command('models:prune')->daily()->at('03:00');

// ----------------------------------------------------------------------------
// SAATLİK İŞLER
// ----------------------------------------------------------------------------

// Slow query raporu (pg_stat_statements extension'ından)
Schedule::command('db:slow-queries-report')
    ->hourly()
    ->withoutOverlapping()
    ->onOneServer()
    ->appendOutputTo(storage_path('logs/slow-queries-report.log'));

// PostgreSQL performans raporu (haftalık, sorun tespit edilirse mail gönder)
Schedule::command('db:performance-report --send-mail')
    ->weekly()
    ->mondays()
    ->at('09:00')
    ->withoutOverlapping()
    ->onOneServer()
    ->appendOutputTo(storage_path('logs/postgres-performance-report.log'));

// ----------------------------------------------------------------------------
// HER DAKİKA İŞLER
// ----------------------------------------------------------------------------

// Slow query log dosyasını oku, batch email gönder ve temizle (her 5 dakikada bir)
Schedule::command('slow-query:process-logs --min-queries=5')
    ->everyFiveMinutes()
    ->withoutOverlapping()
    ->onOneServer()
    ->appendOutputTo(storage_path('logs/slow-query-processor.log'));

// Alert log dosyalarını oku, batch email gönder ve temizle (her 5 dakikada bir)
Schedule::command('alerts:process-logs --min-items=5')
    ->everyFiveMinutes()
    ->withoutOverlapping()
    ->onOneServer()
    ->appendOutputTo(storage_path('logs/alert-processor.log'));

// Queue worker'lar supervisor veya systemd ile koşacak, scheduler'dan değil.
// Bu yüzden burada queue:work komutu yok.

// ----------------------------------------------------------------------------
// NOTLAR
// ----------------------------------------------------------------------------
// - withoutOverlapping(): Aynı komutun aynı anda birden fazla çalışmasını engeller
// - onOneServer(): Multi-server ortamında sadece bir sunucuda çalıştırır
// - appendOutputTo(): Komut çıktısını log dosyasına ekler
// - sendOutputTo(): Komut çıktısını log dosyasına yazar (append yerine)
