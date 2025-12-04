<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PostgresPerformanceReport extends Command
{
    protected $signature = 'pg:performance-report {--section=all : Specific section to run (cache, tables, indexes, bloat, config, queries)}';

    protected $description = 'PostgreSQL performans raporu - README_pg_performance.md\'deki tüm sorguları çalıştırır';

    public function handle()
    {
        $section = $this->option('section');

        $this->info('📊 PostgreSQL Performans Raporu');
        $this->info('================================');
        $this->newLine();

        if ($section === 'all' || $section === 'cache') {
            $this->showCacheHitRatio();
        }

        if ($section === 'all' || $section === 'tables') {
            $this->showTableIO();
        }

        if ($section === 'all' || $section === 'indexes') {
            $this->showIndexUsage();
        }

        if ($section === 'all' || $section === 'bloat') {
            $this->showBloat();
        }

        if ($section === 'all' || $section === 'config') {
            $this->showConfig();
        }

        if ($section === 'all' || $section === 'queries') {
            $this->showQueryStats();
        }

        return Command::SUCCESS;
    }

    private function showCacheHitRatio()
    {
        $this->info('1️⃣  Global Cache Hit Oranı (RAM / Cache Durumu)');
        $this->info('─────────────────────────────────────────────────');
        $this->line('📌 Açıklama: PostgreSQL\'in RAM\'den ne kadar veri okuduğunu gösterir.');
        $this->line('   Yüksek oran = Hızlı performans (RAM\'den okuma)');
        $this->line('   Düşük oran = Yavaş performans (Disk\'ten okuma)');
        $this->newLine();

        try {
            $result = DB::selectOne('
                SELECT
                  sum(blks_hit) * 100.0
                    / NULLIF(sum(blks_hit) + sum(blks_read), 0) AS cache_hit_ratio
                FROM pg_stat_database
            ');

            $ratio = round($result->cache_hit_ratio ?? 0, 2);

            $this->line("📊 Cache Hit Ratio: {$ratio}%");
            $this->newLine();

            if ($ratio >= 99) {
                $this->info("✅ Çok iyi (%99+) - Neredeyse tüm veriler RAM'den okunuyor");
            } elseif ($ratio >= 95) {
                $this->comment("⚠️  Kabul edilebilir (%95–99) - Çoğu veri RAM'den, bazı disk okumaları var");
            } elseif ($ratio >= 90) {
                $this->warn('⚠️  İyileştirme gerekli (%90–95) - Sorgu/index/RAM ayarları incelenmeli');
            } else {
                $this->error('❌ Kritik (%90 altı) - Çok fazla disk okuma var, performans sorunu!');
            }
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
        }

        $this->newLine(2);
    }

    private function showTableIO()
    {
        $this->info('2️⃣  Tablo Bazlı I/O (Hangi Tablo RAM\'i ve Diski Gömüyor?)');
        $this->info('─────────────────────────────────────────────────────────────');
        $this->line('📌 Açıklama: Hangi tabloların en çok disk okuma yaptığını gösterir.');
        $this->line('   Heap = Tablo verileri, Index = Index verileri');
        $this->line('   Yüksek disk okuma = Tablo RAM\'e sığmıyor veya index eksik');
        $this->newLine();

        // Heap I/O
        $this->line('📊 Tablo Heap I/O (Tablo Verileri):');
        try {
            $results = DB::select('
                SELECT
                  relname,
                  heap_blks_read,
                  heap_blks_hit,
                  ROUND(
                    100.0 * heap_blks_hit::numeric
                      / NULLIF(heap_blks_hit + heap_blks_read, 0),
                    2
                  ) AS hit_ratio
                FROM pg_statio_user_tables
                WHERE (heap_blks_hit + heap_blks_read) > 1000
                ORDER BY hit_ratio ASC, (heap_blks_hit + heap_blks_read) DESC
                LIMIT 30
            ');

            $headers = ['Tablo Adı', 'Disk Okuma', 'RAM Okuma', 'Hit Ratio %', 'Durum'];
            $rows = [];

            foreach ($results as $row) {
                $hitRatio = (float) ($row->hit_ratio ?? 0);

                $status = '';
                if ($hitRatio >= 95) {
                    $status = '✅ İyi';
                } elseif ($hitRatio >= 80) {
                    $status = '⚠️ Orta';
                } else {
                    $status = '❌ Kötü';
                }

                $rows[] = [
                    $row->relname,
                    number_format($row->heap_blks_read),
                    number_format($row->heap_blks_hit),
                    $row->hit_ratio ?? '0.00',
                    $status,
                ];
            }

            $this->table($headers, $rows);
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
        }

        $this->newLine();

        // Index I/O
        $this->line('📊 Index I/O (Index Verileri):');
        try {
            $results = DB::select('
                SELECT
                  relname,
                  idx_blks_read,
                  idx_blks_hit,
                  ROUND(
                    100.0 * idx_blks_hit::numeric
                      / NULLIF(idx_blks_hit + idx_blks_read, 0),
                    2
                  ) AS index_cache_hit_ratio
                FROM pg_statio_user_indexes
                WHERE (idx_blks_hit + idx_blks_read) > 1000
                ORDER BY index_cache_hit_ratio ASC, (idx_blks_hit + idx_blks_read) DESC
                LIMIT 30
            ');

            $headers = ['Tablo Adı', 'Disk Okuma', 'RAM Okuma', 'Hit Ratio %', 'Durum'];
            $rows = [];

            foreach ($results as $row) {
                $hitRatio = (float) ($row->index_cache_hit_ratio ?? 0);

                $status = '';
                if ($hitRatio >= 95) {
                    $status = '✅ İyi';
                } elseif ($hitRatio >= 80) {
                    $status = '⚠️ Orta';
                } else {
                    $status = '❌ Kötü';
                }

                $rows[] = [
                    $row->relname,
                    number_format($row->idx_blks_read),
                    number_format($row->idx_blks_hit),
                    $row->index_cache_hit_ratio ?? '0.00',
                    $status,
                ];
            }

            $this->table($headers, $rows);
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
        }

        $this->newLine(2);
    }

    private function showIndexUsage()
    {
        $this->info('3️⃣  Index Kullanım Oranı (Tablolar Indexsiz mi Geziyor?)');
        $this->info('───────────────────────────────────────────────────────────');
        $this->line('📌 Açıklama: Tablolardaki sorguların index kullanma oranını gösterir.');
        $this->line('   Yüksek oran = Sorgular index kullanıyor (hızlı)');
        $this->line('   Düşük oran = Sorgular full table scan yapıyor (yavaş)');
        $this->newLine();

        try {
            $results = DB::select('
                SELECT
                  relname,
                  n_live_tup,
                  CASE
                    WHEN seq_scan + idx_scan = 0 THEN 0
                    ELSE ROUND(100.0 * idx_scan / (seq_scan + idx_scan), 2)
                  END AS index_usage_pct
                FROM pg_stat_user_tables
                WHERE (seq_scan + idx_scan) > 100 AND n_live_tup > 1000
                ORDER BY index_usage_pct ASC, n_live_tup DESC
                LIMIT 30
            ');

            $headers = ['Tablo Adı', 'Toplam Satır', 'Index Kullanım %', 'Durum'];
            $rows = [];

            foreach ($results as $row) {
                $usage = (float) ($row->index_usage_pct ?? 0);

                $status = '';
                $statusText = '';
                if ($usage >= 90) {
                    $status = '✅';
                    $statusText = 'İyi - Indexler kullanılıyor';
                } elseif ($usage >= 50) {
                    $status = '⚠️';
                    $statusText = 'Orta - Bazı sorgular indexsiz';
                } else {
                    $status = '❌';
                    $statusText = 'Kötü - Çok fazla full scan';
                }

                $rows[] = [
                    $row->relname,
                    number_format($row->n_live_tup),
                    $usage.'%',
                    $status.' '.$statusText,
                ];
            }

            $this->table($headers, $rows);
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
        }

        $this->newLine(2);
    }

    private function showBloat()
    {
        $this->info('4️⃣  Bloat (Şişmiş Tablo) Kontrolü');
        $this->info('───────────────────────────────────');
        $this->line('📌 Açıklama: Tablolardaki ölü (silinmiş/güncellenmiş) satır oranını gösterir.');
        $this->line('   Yüksek bloat = Tablo gereksiz yere şişmiş, VACUUM gerekebilir');
        $this->line('   Düşük bloat = Tablo temiz, normal durum');
        $this->newLine();

        try {
            $results = DB::select("
                SELECT
                  schemaname AS table_schema,
                  relname     AS table_name,
                  n_live_tup,
                  n_dead_tup,
                  ROUND( (n_dead_tup::numeric / NULLIF(n_live_tup, 0)) , 4) AS bloat_ratio,
                  pg_size_pretty(pg_relation_size(quote_ident(schemaname)||'.'||quote_ident(relname))) AS table_size
                FROM pg_stat_user_tables
                ORDER BY bloat_ratio DESC
                LIMIT 30
            ");

            $headers = ['Schema', 'Tablo Adı', 'Canlı Satır', 'Ölü Satır', 'Bloat Ratio', 'Tablo Boyutu', 'Durum'];
            $rows = [];

            foreach ($results as $row) {
                $ratio = (float) ($row->bloat_ratio ?? 0);

                $status = '';
                $statusText = '';
                if ($ratio < 0.1) {
                    $status = '✅';
                    $statusText = 'Normal';
                } elseif ($ratio < 0.5) {
                    $status = '⚠️';
                    $statusText = 'Takip et';
                } else {
                    $status = '❌';
                    $statusText = 'VACUUM gerekli';
                }

                $rows[] = [
                    $row->table_schema,
                    $row->table_name,
                    number_format($row->n_live_tup),
                    number_format($row->n_dead_tup),
                    $ratio,
                    $row->table_size,
                    $status.' '.$statusText,
                ];
            }

            $this->table($headers, $rows);
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
        }

        $this->newLine(2);
    }

    private function showConfig()
    {
        $this->info('5️⃣  PostgreSQL Config Kontrolü (RAM Kullanım Ayarları)');
        $this->info('───────────────────────────────────────────────────────────');
        $this->line('📌 Açıklama: PostgreSQL\'in RAM kullanım ayarlarını gösterir.');
        $this->line('   Bu ayarlar performansı doğrudan etkiler.');
        $this->newLine();

        $configs = [
            'shared_buffers' => 'PostgreSQL\'in kullandığı ana RAM cache (RAM\'in %25\'i olmalı)',
            'effective_cache_size' => 'Planner\'a söylenen toplam cache boyutu (RAM\'in %50-75\'i)',
            'work_mem' => 'Her sorgu için kullanılabilecek RAM (16-32MB önerilir)',
            'maintenance_work_mem' => 'VACUUM/Index işlemleri için RAM (512MB-1GB önerilir)',
        ];

        $headers = ['Ayar', 'Değer', 'Açıklama'];
        $rows = [];

        foreach ($configs as $config => $description) {
            try {
                $result = DB::selectOne("SHOW {$config}");
                $value = $result->{$config} ?? 'N/A';

                $rows[] = [$config, $value, $description];
            } catch (\Exception $e) {
                $rows[] = [$config, 'Hata: '.$e->getMessage(), $description];
            }
        }

        $this->table($headers, $rows);

        $this->newLine(2);
    }

    private function showQueryStats()
    {
        $this->info('6️⃣  Sorgu Bazlı Analiz (pg_stat_statements)');
        $this->info('─────────────────────────────────────────────');
        $this->line('📌 Açıklama: En çok zaman harcayan ve en çok disk okuma yapan sorguları gösterir.');
        $this->line('   Bu sorgular optimizasyon için öncelikli adaylardır.');
        $this->newLine();

        // En çok toplam süre harcayan sorgular
        $this->line('⏱️  En Çok Toplam Süre Harcayan Sorgular (Sistemi En Çok Yoran):');
        try {
            $results = DB::select('
                SELECT
                  query,
                  calls,
                  round(total_exec_time::numeric, 2) AS total_ms,
                  round(mean_exec_time::numeric, 2)  AS mean_ms,
                  shared_blks_hit,
                  shared_blks_read
                FROM pg_stat_statements
                ORDER BY total_exec_time DESC
                LIMIT 20
            ');

            $headers = ['Sorgu (Önizleme)', 'Çağrı Sayısı', 'Toplam Süre (ms)', 'Ortalama (ms)', 'RAM Okuma', 'Disk Okuma'];
            $rows = [];
            $fullQueries = [];

            foreach ($results as $index => $row) {
                $queryPreview = strlen($row->query) > 50 ? substr($row->query, 0, 50).'...' : $row->query;

                $rows[] = [
                    $queryPreview,
                    number_format($row->calls),
                    number_format($row->total_ms, 2),
                    number_format($row->mean_ms, 2),
                    number_format($row->shared_blks_hit),
                    number_format($row->shared_blks_read),
                ];

                if (strlen($row->query) > 50) {
                    $fullQueries[] = [
                        'index' => $index + 1,
                        'query' => $row->query,
                        'total_ms' => $row->total_ms,
                        'mean_ms' => $row->mean_ms,
                    ];
                }
            }

            $this->table($headers, $rows);

            // Tam sorguları göster
            if (! empty($fullQueries)) {
                $this->newLine();
                $this->info('📋 Tam Sorgular (Kısa Kesilenler):');
                $this->line('─────────────────────────────────');
                foreach ($fullQueries as $item) {
                    $this->line(($item['index']).'. Toplam: '.number_format($item['total_ms'], 2).'ms | Ortalama: '.number_format($item['mean_ms'], 2).'ms');
                    $this->line('   '.$item['query']);
                    $this->newLine();
                }
            }
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
            $this->warn('Not: pg_stat_statements extension aktif olmayabilir.');
        }

        $this->newLine();

        // En çok diske okuma yapan sorgular
        $this->line('💾 En Çok Diske Okuma Yapan Sorgular (Index/Heap Yetersiz):');
        try {
            $results = DB::select('
                SELECT
                  query,
                  calls,
                  round(mean_exec_time::numeric, 2) AS mean_ms,
                  shared_blks_read,
                  shared_blks_hit
                FROM pg_stat_statements
                ORDER BY shared_blks_read DESC
                LIMIT 20
            ');

            $headers = ['Sorgu (Önizleme)', 'Çağrı Sayısı', 'Ortalama (ms)', 'Disk Okuma', 'RAM Okuma'];
            $rows = [];
            $fullQueries = [];

            foreach ($results as $index => $row) {
                $queryPreview = strlen($row->query) > 50 ? substr($row->query, 0, 50).'...' : $row->query;

                $rows[] = [
                    $queryPreview,
                    number_format($row->calls),
                    number_format($row->mean_ms, 2),
                    number_format($row->shared_blks_read),
                    number_format($row->shared_blks_hit),
                ];

                if (strlen($row->query) > 50) {
                    $fullQueries[] = [
                        'index' => $index + 1,
                        'query' => $row->query,
                        'mean_ms' => $row->mean_ms,
                        'shared_blks_read' => $row->shared_blks_read,
                    ];
                }
            }

            $this->table($headers, $rows);

            // Tam sorguları göster
            if (! empty($fullQueries)) {
                $this->newLine();
                $this->info('📋 Tam Sorgular (Kısa Kesilenler):');
                $this->line('─────────────────────────────────');
                foreach ($fullQueries as $item) {
                    $this->line(($item['index']).'. Ortalama: '.number_format($item['mean_ms'], 2).'ms | Disk Okuma: '.number_format($item['shared_blks_read']));
                    $this->line('   '.$item['query']);
                    $this->newLine();
                }
            }
        } catch (\Exception $e) {
            $this->error('Hata: '.$e->getMessage());
        }

        $this->newLine(2);
    }
}
