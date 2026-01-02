<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SlowQueriesReport extends Command
{
    protected $signature = 'db:slow-queries-report';

    protected $description = 'PostgreSQL slow queries raporu oluştur (pg_stat_statements kullanarak)';

    public function handle(): int
    {
        $this->info('Slow queries raporu oluşturuluyor...');

        // pg_stat_statements extension'ının kurulu olup olmadığını kontrol et
        if (! $this->isExtensionInstalled()) {
            $this->warn('pg_stat_statements extension kurulu değil.');
            $this->line('');
            $this->line('Kurulum için:');
            $this->line('  1. PostgreSQL\'e bağlan: psql -U postgres -d your_database');
            $this->line('  2. Extension\'ı kur: CREATE EXTENSION IF NOT EXISTS pg_stat_statements;');
            $this->line('  3. postgresql.conf dosyasında shared_preload_libraries = \'pg_stat_statements\' olduğundan emin ol');
            $this->line('  4. PostgreSQL\'i yeniden başlat');
            $this->line('');
            $this->line('Alternatif: Laravel Pulse kullanarak slow query monitoring yapabilirsiniz.');

            return Command::FAILURE;
        }

        $thresholdMs = (int) config('database.slow_query_threshold_ms', 1000);
        $limit = (int) config('database.slow_query_limit', 50);

        $sql = "SELECT query, calls, total_exec_time, mean_exec_time FROM pg_stat_statements WHERE mean_exec_time > :threshold ORDER BY mean_exec_time DESC LIMIT {$limit}";

        try {
            $slowQueries = DB::select($sql, ['threshold' => $thresholdMs]);
        } catch (\Throwable $exception) {
            $errorMessage = $exception->getMessage();

            // Extension kurulu ama shared_preload_libraries ile yüklenmemiş
            if (str_contains($errorMessage, 'shared_preload_libraries')) {
                $this->error('pg_stat_statements extension kurulu ama shared_preload_libraries ile yüklenmemiş.');
                $this->line('');
                $this->line('Çözüm:');
                $this->line('  1. postgresql.conf dosyasını bul (genellikle /etc/postgresql/{version}/main/postgresql.conf)');
                $this->line('  2. shared_preload_libraries satırını bul ve şu şekilde güncelle:');
                $this->line('     shared_preload_libraries = \'pg_stat_statements\'');
                $this->line('  3. PostgreSQL\'i yeniden başlat: sudo systemctl restart postgresql');
                $this->line('  4. Extension\'ı kur: CREATE EXTENSION IF NOT EXISTS pg_stat_statements;');
                $this->line('');
                $this->line('Alternatif: Laravel Pulse kullanarak slow query monitoring yapabilirsiniz.');

                return Command::FAILURE;
            }

            // Diğer hatalar
            $this->error('pg_stat_statements okunurken hata oluştu: '.$errorMessage);
            Log::error('Slow query raporu oluşturulamadı', ['exception' => $exception]);

            return Command::FAILURE;
        }

        if (empty($slowQueries)) {
            $this->info('Belirlenen threshold üzerinde yavaş query bulunamadı.');

            return Command::SUCCESS;
        }

        $headers = ['Calls', 'Mean (ms)', 'Total (ms)', 'Query'];
        $rows = array_map(static fn ($stat) => [
            number_format((int) $stat->calls),
            number_format((float) $stat->mean_exec_time, 2),
            number_format((float) $stat->total_exec_time, 2),
            $stat->query,
        ], $slowQueries);

        $this->table($headers, $rows);

        Log::info('Slow query raporu oluşturuldu', [
            'threshold_ms' => $thresholdMs,
            'limit' => $limit,
            'result_count' => \count($slowQueries),
        ]);

        return Command::SUCCESS;
    }

    /**
     * pg_stat_statements extension'ının kurulu olup olmadığını kontrol et.
     */
    protected function isExtensionInstalled(): bool
    {
        try {
            $result = DB::selectOne("SELECT EXISTS(SELECT 1 FROM pg_extension WHERE extname = 'pg_stat_statements') as exists");

            return (bool) ($result->exists ?? false);
        } catch (\Throwable $exception) {
            // Extension kontrolü sırasında hata oluşursa (örneğin MySQL kullanılıyorsa)
            return false;
        }
    }
}
