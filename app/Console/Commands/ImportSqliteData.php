<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportSqliteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import-sqlite {--table=* : Belirli tabloları import et}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SQLite veritabanındaki verileri PostgreSQL\'e aktarır';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $sqlitePath = database_path('database.sqlite');

        if (!file_exists($sqlitePath)) {
            $this->error('SQLite veritabanı bulunamadı: ' . $sqlitePath);
            return 1;
        }

        // SQLite bağlantısı
        $sqliteDb = new \PDO('sqlite:' . $sqlitePath);
        $sqliteDb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        // PostgreSQL bağlantısı (mevcut bağlantı)
        $pgsqlDb = DB::connection('pgsql');

        // Import edilecek tablolar - Foreign key bağımlılıklarına göre sıralı
        $tables = $this->option('table');

        if (empty($tables)) {
            // Foreign key bağımlılıklarına göre sıralı tablo listesi
            $orderedTables = [
                // Temel tablolar (foreign key yok)
                'users',
                'categories',
                'brands',
                'mannequins',
                'suppliers',
                'tags',
                'variations',
                'variation_values',
                'variation_templates',
                'variation_template_values',
                'attribute_sets',
                'attributes',
                'attribute_values',
                'product_options',
                'product_option_values',
                'tax_classes',
                'currencies',
                'payment_methods',
                'shipping_methods',
                'bank_accounts',
                'customer_groups',
                'customers',
                'customer_representatives',
                'user_groups',
                'email_templates',
                'sms_templates',
                'languages',
                'menus',
                'redirects',
                'analytics',
                'custom_codes',
                'integrations',
                'store_settings',
                'pages',
                'blogs',
                'faqs',
                'banners',
                'popups',
                'sliders',
                'showcases',
                'contact_forms',
                'newsletters',
                'payment_notifications',
                'notification_history',
                // İlişkisel tablolar
                'attribute_categories',
                'product_categories',
                'product_tags',
                'product_attributes',
                'products',
                'product_variations',
                'product_variation_values',
                'product_option_product',
                'product_media',
                'product_links',
                'customer_customer_group',
                'user_user_group',
                'activity_logs',
            ];

            // SQLite'da var olan tabloları filtrele
            $stmt = $sqliteDb->query(
                "SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%' AND name NOT IN ('migrations', 'cache', 'cache_locks', 'sessions', 'jobs', 'job_batches', 'failed_jobs')"
            );
            $existingTables = $stmt->fetchAll(\PDO::FETCH_COLUMN);

            // Sıralı listedeki tabloları al
            $tables = array_intersect($orderedTables, $existingTables);

            // Sıralı listede olmayan tabloları sona ekle
            $remainingTables = array_diff($existingTables, $orderedTables);
            $tables = array_merge($tables, $remainingTables);
        }

        $this->info('Veri aktarımı başlıyor...');
        $this->newLine();

        $imported = 0;
        $skipped = 0;
        $errors = 0;

        foreach ($tables as $table) {
            try {
                // Tablo var mı kontrol et
                if (!Schema::connection('pgsql')->hasTable($table)) {
                    $this->warn("  ⚠ Tablo bulunamadı: {$table}");
                    $skipped++;
                    continue;
                }

                // SQLite'dan veri sayısını kontrol et
                $count = $sqliteDb->query("SELECT COUNT(*) FROM \"{$table}\"")->fetchColumn();

                if ($count == 0) {
                    $this->line("  ○ {$table}: Veri yok (atlandı)");
                    $skipped++;
                    continue;
                }

                // PostgreSQL'de mevcut veri sayısı
                $existingCount = $pgsqlDb->table($table)->count();

                if ($existingCount > 0) {
                    $this->warn("  ⚠ {$table}: PostgreSQL'de zaten {$existingCount} kayıt var (atlandı)");
                    $skipped++;
                    continue;
                }

                // SQLite'dan verileri al
                $stmt = $sqliteDb->query("SELECT * FROM \"{$table}\"");
                $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                if (empty($rows)) {
                    $this->line("  ○ {$table}: Veri yok (atlandı)");
                    $skipped++;
                    continue;
                }

                // PostgreSQL'e yaz
                $pgsqlDb->beginTransaction();

                try {
                    foreach ($rows as $row) {
                        // NULL değerleri düzelt
                        $cleanRow = [];
                        foreach ($row as $key => $value) {
                            $cleanRow[$key] = $value === '' ? null : $value;
                        }

                        $pgsqlDb->table($table)->insert($cleanRow);
                    }

                    $pgsqlDb->commit();
                    $this->info("  ✓ {$table}: {$count} kayıt aktarıldı");
                    $imported++;
                } catch (\Exception $e) {
                    $pgsqlDb->rollBack();
                    throw $e;
                }
            } catch (\Exception $e) {
                $this->error("  ✗ {$table}: Hata - " . $e->getMessage());
                $errors++;
            }
        }

        $this->newLine();
        $this->info("Tamamlandı!");
        $this->line("  Aktarılan: {$imported} tablo");
        $this->line("  Atlanan: {$skipped} tablo");
        if ($errors > 0) {
            $this->error("  Hatalar: {$errors} tablo");
        }

        return 0;
    }
}
