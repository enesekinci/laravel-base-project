<?php

namespace App\Console\Commands;

use App\Mail\PostgresPerformanceAlertMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostgresPerformanceReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:performance-report {--send-mail : Sorun tespit edilirse mail gönder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'PostgreSQL performans raporu oluştur ve sorunları tespit et';

    /**
     * Tespit edilen sorunlar
     *
     * @var array<string, mixed>
     */
    protected array $issues = [];

    /**
     * Performans metrikleri
     *
     * @var array<string, mixed>
     */
    protected array $metrics = [];

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('PostgreSQL performans raporu oluşturuluyor...');
        $this->line('');

        // PostgreSQL kontrolü
        if (! $this->isPostgreSQL()) {
            $this->warn('Bu komut sadece PostgreSQL için çalışır.');

            return Command::FAILURE;
        }

        // Performans metriklerini topla
        $this->collectMetrics();

        // Sorunları tespit et
        $this->detectIssues();

        // Raporu göster
        $this->displayReport();

        // Sorun varsa mail gönder
        if (! empty($this->issues) && $this->option('send-mail')) {
            $this->sendAlertEmail();
        }

        // Log'a kaydet
        $this->logReport();

        return Command::SUCCESS;
    }

    /**
     * PostgreSQL kullanılıp kullanılmadığını kontrol et
     */
    protected function isPostgreSQL(): bool
    {
        try {
            $driver = DB::connection()->getDriverName();

            return $driver === 'pgsql';
        } catch (\Throwable $exception) {
            return false;
        }
    }

    /**
     * Performans metriklerini topla
     */
    protected function collectMetrics(): void
    {
        $this->info('📊 Performans metrikleri toplanıyor...');

        // Database boyutu
        $this->metrics['database_size'] = $this->getDatabaseSize();

        // Top 10 büyük tablolar
        $this->metrics['large_tables'] = $this->getLargeTables(10);

        // Cache hit ratio
        $this->metrics['cache_hit_ratio'] = $this->getCacheHitRatio();

        // Index kullanımı
        $this->metrics['index_usage'] = $this->getIndexUsage();

        // Dead tuples
        $this->metrics['dead_tuples'] = $this->getDeadTuples();

        // Connection istatistikleri
        $this->metrics['connections'] = $this->getConnectionStats();

        // Lock istatistikleri
        $this->metrics['locks'] = $this->getLockStats();

        // Vacuum istatistikleri
        $this->metrics['vacuum_stats'] = $this->getVacuumStats();

        // Slow queries (pg_stat_statements varsa)
        if ($this->isExtensionInstalled('pg_stat_statements')) {
            $this->metrics['slow_queries'] = $this->getSlowQueries(10);
        }
    }

    /**
     * Database boyutunu al
     */
    protected function getDatabaseSize(): array
    {
        try {
            $result = DB::selectOne('
                SELECT 
                    pg_size_pretty(pg_database_size(current_database())) as size,
                    pg_database_size(current_database()) as size_bytes
            ');

            return [
                'size' => $result->size ?? 'N/A',
                'size_bytes' => (int) ($result->size_bytes ?? 0),
            ];
        } catch (\Throwable $exception) {
            return ['size' => 'N/A', 'size_bytes' => 0];
        }
    }

    /**
     * Büyük tabloları al
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getLargeTables(int $limit = 10): array
    {
        try {
            $tables = DB::select("
                SELECT 
                    schemaname || '.' || tablename as table_name,
                    pg_size_pretty(pg_total_relation_size(schemaname||'.'||tablename)) as total_size,
                    pg_size_pretty(pg_relation_size(schemaname||'.'||tablename)) as table_size,
                    pg_size_pretty(pg_total_relation_size(schemaname||'.'||tablename) - pg_relation_size(schemaname||'.'||tablename)) as indexes_size,
                    pg_total_relation_size(schemaname||'.'||tablename) as total_size_bytes,
                    (SELECT n_live_tup FROM pg_stat_user_tables WHERE schemaname = t.schemaname AND relname = t.tablename) as row_count
                FROM pg_tables t
                WHERE schemaname NOT IN ('pg_catalog', 'information_schema')
                ORDER BY pg_total_relation_size(schemaname||'.'||tablename) DESC
                LIMIT ?
            ", [$limit]);

            return array_map(static function ($table) {
                return [
                    'table' => $table->table_name,
                    'total_size' => $table->total_size,
                    'table_size' => $table->table_size,
                    'indexes_size' => $table->indexes_size,
                    'total_size_bytes' => (int) $table->total_size_bytes,
                    'row_count' => (int) ($table->row_count ?? 0),
                ];
            }, $tables);
        } catch (\Throwable $exception) {
            return [];
        }
    }

    /**
     * Cache hit ratio'yu al
     */
    protected function getCacheHitRatio(): array
    {
        try {
            $result = DB::selectOne('
                SELECT 
                    sum(heap_blks_hit) / nullif(sum(heap_blks_hit) + sum(heap_blks_read), 0) * 100 as heap_hit_ratio,
                    sum(idx_blks_hit) / nullif(sum(idx_blks_hit) + sum(idx_blks_read), 0) * 100 as idx_hit_ratio
                FROM pg_statio_user_tables
            ');

            return [
                'heap_hit_ratio' => round((float) ($result->heap_hit_ratio ?? 0), 2),
                'idx_hit_ratio' => round((float) ($result->idx_hit_ratio ?? 0), 2),
            ];
        } catch (\Throwable $exception) {
            return ['heap_hit_ratio' => 0, 'idx_hit_ratio' => 0];
        }
    }

    /**
     * Index kullanım istatistiklerini al
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getIndexUsage(): array
    {
        try {
            $indexes = DB::select("
                SELECT 
                    schemaname || '.' || indexrelname as index_name,
                    schemaname || '.' || relname as table_name,
                    idx_scan as index_scans,
                    idx_tup_read as tuples_read,
                    idx_tup_fetch as tuples_fetched,
                    pg_size_pretty(pg_relation_size(indexrelid)) as index_size
                FROM pg_stat_user_indexes
                ORDER BY idx_scan ASC
                LIMIT 20
            ");

            return array_map(static function ($index) {
                return [
                    'index' => $index->index_name,
                    'table' => $index->table_name,
                    'scans' => (int) $index->index_scans,
                    'tuples_read' => (int) $index->tuples_read,
                    'tuples_fetched' => (int) $index->tuples_fetched,
                    'size' => $index->index_size,
                ];
            }, $indexes);
        } catch (\Throwable $exception) {
            return [];
        }
    }

    /**
     * Dead tuples istatistiklerini al
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getDeadTuples(): array
    {
        try {
            $tables = DB::select("
                SELECT 
                    schemaname || '.' || relname as table_name,
                    n_live_tup as live_tuples,
                    n_dead_tup as dead_tuples,
                    CASE 
                        WHEN n_live_tup > 0 THEN round(n_dead_tup::numeric / n_live_tup::numeric * 100, 2)
                        ELSE 0
                    END as dead_ratio,
                    last_vacuum,
                    last_autovacuum,
                    last_analyze,
                    last_autoanalyze
                FROM pg_stat_user_tables
                WHERE n_dead_tup > 0
                ORDER BY n_dead_tup DESC
                LIMIT 20
            ");

            return array_map(static function ($table) {
                return [
                    'table' => $table->table_name,
                    'live_tuples' => (int) $table->live_tuples,
                    'dead_tuples' => (int) $table->dead_tuples,
                    'dead_ratio' => round((float) $table->dead_ratio, 2),
                    'last_vacuum' => $table->last_vacuum,
                    'last_autovacuum' => $table->last_autovacuum,
                    'last_analyze' => $table->last_analyze,
                    'last_autoanalyze' => $table->last_autoanalyze,
                ];
            }, $tables);
        } catch (\Throwable $exception) {
            return [];
        }
    }

    /**
     * Connection istatistiklerini al
     */
    protected function getConnectionStats(): array
    {
        try {
            $result = DB::selectOne("
                SELECT 
                    count(*) as total_connections,
                    count(*) FILTER (WHERE state = 'active') as active_connections,
                    count(*) FILTER (WHERE state = 'idle') as idle_connections,
                    count(*) FILTER (WHERE state = 'idle in transaction') as idle_in_transaction
                FROM pg_stat_activity
                WHERE datname = current_database()
            ");

            $maxConnections = DB::selectOne('SHOW max_connections');

            return [
                'total' => (int) ($result->total_connections ?? 0),
                'active' => (int) ($result->active_connections ?? 0),
                'idle' => (int) ($result->idle_connections ?? 0),
                'idle_in_transaction' => (int) ($result->idle_in_transaction ?? 0),
                'max_connections' => (int) ($maxConnections->max_connections ?? 100),
            ];
        } catch (\Throwable $exception) {
            return [
                'total' => 0,
                'active' => 0,
                'idle' => 0,
                'idle_in_transaction' => 0,
                'max_connections' => 100,
            ];
        }
    }

    /**
     * Lock istatistiklerini al
     */
    protected function getLockStats(): array
    {
        try {
            $locks = DB::select('
                SELECT 
                    locktype,
                    mode,
                    count(*) as count
                FROM pg_locks
                WHERE database = (SELECT oid FROM pg_database WHERE datname = current_database())
                GROUP BY locktype, mode
                ORDER BY count(*) DESC
            ');

            $blockingLocks = DB::select('
                SELECT count(*) as count
                FROM pg_locks l1
                JOIN pg_locks l2 ON l1.pid = l2.pid
                WHERE l1.granted = false AND l2.granted = true
            ');

            return [
                'locks' => array_map(static function ($lock) {
                    return [
                        'type' => $lock->locktype,
                        'mode' => $lock->mode,
                        'count' => (int) $lock->count,
                    ];
                }, $locks),
                'blocking_locks' => (int) ($blockingLocks[0]->count ?? 0),
            ];
        } catch (\Throwable $exception) {
            return ['locks' => [], 'blocking_locks' => 0];
        }
    }

    /**
     * Vacuum istatistiklerini al
     */
    protected function getVacuumStats(): array
    {
        try {
            $result = DB::selectOne("
                SELECT 
                    count(*) FILTER (WHERE last_vacuum IS NULL AND last_autovacuum IS NULL) as never_vacuumed,
                    count(*) FILTER (WHERE last_vacuum < now() - interval '7 days' AND last_autovacuum < now() - interval '7 days') as not_vacuumed_7days,
                    count(*) FILTER (WHERE last_analyze IS NULL AND last_autoanalyze IS NULL) as never_analyzed
                FROM pg_stat_user_tables
            ");

            return [
                'never_vacuumed' => (int) ($result->never_vacuumed ?? 0),
                'not_vacuumed_7days' => (int) ($result->not_vacuumed_7days ?? 0),
                'never_analyzed' => (int) ($result->never_analyzed ?? 0),
            ];
        } catch (\Throwable $exception) {
            return [
                'never_vacuumed' => 0,
                'not_vacuumed_7days' => 0,
                'never_analyzed' => 0,
            ];
        }
    }

    /**
     * Slow queries'i al
     *
     * @return array<int, array<string, mixed>>
     */
    protected function getSlowQueries(int $limit = 10): array
    {
        try {
            $thresholdMs = (int) config('database.slow_query_threshold_ms', 1000);

            $queries = DB::select('
                SELECT 
                    query,
                    calls,
                    total_exec_time,
                    mean_exec_time,
                    max_exec_time
                FROM pg_stat_statements
                WHERE mean_exec_time > ?
                ORDER BY mean_exec_time DESC
                LIMIT ?
            ', [$thresholdMs, $limit]);

            return array_map(static function ($query) {
                return [
                    'query' => substr($query->query, 0, 200) . '...',
                    'calls' => (int) $query->calls,
                    'mean_time' => round((float) $query->mean_exec_time, 2),
                    'max_time' => round((float) $query->max_exec_time, 2),
                    'total_time' => round((float) $query->total_exec_time, 2),
                ];
            }, $queries);
        } catch (\Throwable $exception) {
            return [];
        }
    }

    /**
     * Sorunları tespit et
     */
    protected function detectIssues(): void
    {
        $this->info('🔍 Sorunlar tespit ediliyor...');
        $this->line('');

        // Cache hit ratio kontrolü
        $heapRatio = $this->metrics['cache_hit_ratio']['heap_hit_ratio'] ?? 0;
        $idxRatio = $this->metrics['cache_hit_ratio']['idx_hit_ratio'] ?? 0;

        if ($heapRatio < 90) {
            $this->issues[] = [
                'severity' => 'warning',
                'title' => 'Düşük Heap Cache Hit Ratio',
                'message' => "Heap cache hit ratio %{$heapRatio} (önerilen: >%90). Tablo verileri disk'ten okunuyor, performans düşük olabilir.",
            ];
        }

        if ($idxRatio < 95) {
            $this->issues[] = [
                'severity' => 'warning',
                'title' => 'Düşük Index Cache Hit Ratio',
                'message' => "Index cache hit ratio %{$idxRatio} (önerilen: >%95). Index'ler disk'ten okunuyor, performans düşük olabilir.",
            ];
        }

        // Connection kontrolü
        $connections = $this->metrics['connections'];
        $connectionUsage = ($connections['total'] / $connections['max_connections']) * 100;

        if ($connectionUsage > 80) {
            $this->issues[] = [
                'severity' => 'critical',
                'title' => 'Yüksek Connection Kullanımı',
                'message' => "Connection kullanımı %{$connectionUsage} ({$connections['total']}/{$connections['max_connections']}). Connection limit'ine yaklaşılıyor!",
            ];
        }

        if ($connections['idle_in_transaction'] > 5) {
            $this->issues[] = [
                'severity' => 'warning',
                'title' => 'Idle in Transaction Connections',
                'message' => "{$connections['idle_in_transaction']} connection 'idle in transaction' durumunda. Bu connection'lar lock'ları tutabilir.",
            ];
        }

        // Dead tuples kontrolü
        foreach ($this->metrics['dead_tuples'] as $table) {
            if ($table['dead_ratio'] > 20) {
                $this->issues[] = [
                    'severity' => 'warning',
                    'title' => 'Yüksek Dead Tuple Oranı',
                    'message' => "Tablo '{$table['table']}' için dead tuple oranı %{$table['dead_ratio']} ({$table['dead_tuples']} dead tuples). VACUUM gerekli.",
                ];
            }
        }

        // Blocking locks kontrolü
        if ($this->metrics['locks']['blocking_locks'] > 0) {
            $this->issues[] = [
                'severity' => 'critical',
                'title' => 'Blocking Locks Tespit Edildi',
                'message' => "{$this->metrics['locks']['blocking_locks']} blocking lock tespit edildi. Query'ler bekliyor olabilir.",
            ];
        }

        // Vacuum kontrolü
        $vacuumStats = $this->metrics['vacuum_stats'];
        if ($vacuumStats['never_vacuumed'] > 0) {
            $this->issues[] = [
                'severity' => 'warning',
                'title' => 'Hiç Vacuum Edilmemiş Tablolar',
                'message' => "{$vacuumStats['never_vacuumed']} tablo hiç vacuum edilmemiş. Performans sorunlarına neden olabilir.",
            ];
        }

        if ($vacuumStats['not_vacuumed_7days'] > 0) {
            $this->issues[] = [
                'severity' => 'info',
                'title' => '7 Günden Fazla Vacuum Edilmemiş Tablolar',
                'message' => "{$vacuumStats['not_vacuumed_7days']} tablo son 7 günde vacuum edilmemiş.",
            ];
        }

        // Kullanılmayan index'ler
        $unusedIndexes = array_filter($this->metrics['index_usage'], static fn($index) => $index['scans'] === 0);

        if (count($unusedIndexes) > 5) {
            $this->issues[] = [
                'severity' => 'info',
                'title' => 'Kullanılmayan Index\'ler',
                'message' => count($unusedIndexes) . " index hiç kullanılmamış. Bu index'ler disk alanı kaplıyor ve yazma performansını düşürebilir.",
            ];
        }

        // Büyük tablolar kontrolü
        foreach ($this->metrics['large_tables'] as $table) {
            if ($table['total_size_bytes'] > 10 * 1024 * 1024 * 1024) { // 10GB
                $this->issues[] = [
                    'severity' => 'info',
                    'title' => 'Çok Büyük Tablo',
                    'message' => "Tablo '{$table['table']}' {$table['total_size']} boyutunda. Partitioning veya arşivleme düşünülebilir.",
                ];
            }
        }
    }

    /**
     * Raporu göster
     */
    protected function displayReport(): void
    {
        $this->line('');
        $this->info('═══════════════════════════════════════════════════════════');
        $this->info('📊 PostgreSQL Performans Raporu');
        $this->info('═══════════════════════════════════════════════════════════');
        $this->line('');

        // Database boyutu
        $this->line("💾 Database Boyutu: {$this->metrics['database_size']['size']}");
        $this->line('');

        // Cache hit ratio
        $heapRatio = $this->metrics['cache_hit_ratio']['heap_hit_ratio'];
        $idxRatio = $this->metrics['cache_hit_ratio']['idx_hit_ratio'];
        $heapStatus = $heapRatio >= 90 ? '✅' : '⚠️';
        $idxStatus = $idxRatio >= 95 ? '✅' : '⚠️';
        $this->line("{$heapStatus} Heap Cache Hit Ratio: %{$heapRatio}");
        $this->line("{$idxStatus} Index Cache Hit Ratio: %{$idxRatio}");
        $this->line('');

        // Connections
        $connections = $this->metrics['connections'];
        $connectionUsage = round(($connections['total'] / $connections['max_connections']) * 100, 2);
        $connectionStatus = $connectionUsage < 80 ? '✅' : '❌';
        $this->line("{$connectionStatus} Connections: {$connections['total']}/{$connections['max_connections']} (%{$connectionUsage})");
        $this->line("   - Active: {$connections['active']}");
        $this->line("   - Idle: {$connections['idle']}");
        $this->line("   - Idle in Transaction: {$connections['idle_in_transaction']}");
        $this->line('');

        // Dead tuples
        $deadTuplesCount = count($this->metrics['dead_tuples']);
        if ($deadTuplesCount > 0) {
            $this->line("⚠️  Dead Tuples: {$deadTuplesCount} tabloda dead tuple var");
            $this->line('');
        }

        // Blocking locks
        $blockingLocks = $this->metrics['locks']['blocking_locks'];
        if ($blockingLocks > 0) {
            $this->line("❌ Blocking Locks: {$blockingLocks}");
            $this->line('');
        }

        // Sorunlar
        if (! empty($this->issues)) {
            $this->line('');
            $this->warn('═══════════════════════════════════════════════════════════');
            $this->warn('⚠️  Tespit Edilen Sorunlar (' . count($this->issues) . ')');
            $this->warn('═══════════════════════════════════════════════════════════');
            $this->line('');

            foreach ($this->issues as $index => $issue) {
                $severityIcon = match ($issue['severity']) {
                    'critical' => '🔴',
                    'warning' => '🟡',
                    'info' => '🔵',
                    default => '⚪',
                };

                $this->line("{$severityIcon} [{$issue['severity']}] {$issue['title']}");
                $this->line("   {$issue['message']}");
                $this->line('');
            }
        } else {
            $this->line('');
            $this->info('✅ Tespit edilen sorun yok!');
            $this->line('');
        }

        $this->info('═══════════════════════════════════════════════════════════');
    }

    /**
     * Alert email gönder
     */
    protected function sendAlertEmail(): void
    {
        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            $this->warn('Admin email adresi yapılandırılmamış. Mail gönderilemedi.');

            return;
        }

        try {
            Mail::to($adminEmail)->send(
                new PostgresPerformanceAlertMail($this->metrics, $this->issues)
            );

            $this->info("✅ Alert email gönderildi: {$adminEmail}");
        } catch (\Throwable $exception) {
            $this->error('❌ Alert email gönderilemedi: ' . $exception->getMessage());
            Log::error('PostgreSQL performance alert email gönderilemedi', [
                'exception' => $exception,
                'admin_email' => $adminEmail,
            ]);
        }
    }

    /**
     * Raporu log'a kaydet
     */
    protected function logReport(): void
    {
        Log::info('PostgreSQL performans raporu oluşturuldu', [
            'database_size' => $this->metrics['database_size']['size'],
            'cache_hit_ratio' => $this->metrics['cache_hit_ratio'],
            'connections' => $this->metrics['connections'],
            'issues_count' => count($this->issues),
            'issues' => $this->issues,
        ]);
    }

    /**
     * Extension'ın kurulu olup olmadığını kontrol et
     */
    protected function isExtensionInstalled(string $extension): bool
    {
        try {
            $result = DB::selectOne('SELECT EXISTS(SELECT 1 FROM pg_extension WHERE extname = ?) as exists', [$extension]);

            return (bool) ($result->exists ?? false);
        } catch (\Throwable $exception) {
            return false;
        }
    }
}
