<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModuleRemoveCommand extends Command
{
    protected $signature = 'module:remove {module : Modül adı (örn: blog, cms, crm)} {--dry-run : Sadece göster, silme} {--force : Onay istemeden sil}';

    protected $description = 'Bir modülü ve tüm dosyalarını kaldırır';

    public function handle(): int
    {
        $module = Str::lower($this->argument('module'));
        $modulePascal = Str::studly($module);
        $dryRun = $this->option('dry-run');
        $force = $this->option('force');

        // Modül kontrolü
        if (! config("modules.enabled.{$module}", false)) {
            $this->error("Modül '{$module}' bulunamadı veya zaten devre dışı.");

            return Command::FAILURE;
        }

        $this->info("Modül: {$module} ({$modulePascal})");

        // Silinecek dosyalar ve klasörler
        $pathsToRemove = [
            "app/Models/{$modulePascal}",
            "app/Controllers/{$modulePascal}",
            "app/Services/{$modulePascal}",
            "app/Actions/{$modulePascal}",
            "app/Livewire/{$modulePascal}",
            "app/Requests/{$modulePascal}",
            "app/Resources/{$modulePascal}",
            "app/Policies/{$modulePascal}",
            "app/Events/{$modulePascal}",
            "app/Listeners/{$modulePascal}",
            "app/Jobs/{$modulePascal}",
            "app/Notifications/{$modulePascal}",
            "app/Contracts/{$modulePascal}",
            "app/Repositories/{$modulePascal}",
            "resources/views/livewire/{$module}",
            "database/migrations/{$module}",
            "tests/Feature/{$modulePascal}",
            "tests/Unit/{$modulePascal}",
            "app/Providers/Domains/{$modulePascal}ServiceProvider.php",
        ];

        $this->info("\nSilinecek dosyalar ve klasörler:");
        foreach ($pathsToRemove as $path) {
            $fullPath = base_path($path);
            if (File::exists($fullPath)) {
                $this->line("  - {$path}");
            }
        }

        // Dry-run modu
        if ($dryRun) {
            $this->warn("\n[DRY-RUN] Hiçbir dosya silinmedi.");

            return Command::SUCCESS;
        }

        // Onay
        if (! $force && ! $this->confirm('Bu modülü ve tüm dosyalarını silmek istediğinizden emin misiniz?', false)) {
            $this->info('İşlem iptal edildi.');

            return Command::SUCCESS;
        }

        // Dosyaları sil
        $this->info("\nDosyalar siliniyor...");
        foreach ($pathsToRemove as $path) {
            $fullPath = base_path($path);
            if (File::exists($fullPath)) {
                if (File::isDirectory($fullPath)) {
                    File::deleteDirectory($fullPath);
                } else {
                    File::delete($fullPath);
                }
                $this->line("  ✓ {$path} silindi");
            }
        }

        // Migration dosyası oluştur
        $this->createDropMigration($module, $modulePascal);

        // config/modules.php'den kaldır
        $this->removeFromConfig($module);

        // Route'lardan kaldır (manuel olarak yapılmalı, uyarı ver)
        $this->warn("\n⚠️  Route'ları manuel olarak kaldırmanız gerekiyor:");
        $this->line('  - routes/web.php');
        $this->line('  - routes/api.php');

        // ServiceProvider'ı bootstrap/providers.php'den kaldır (eğer varsa)
        $this->removeFromProviders($modulePascal);

        $this->info("\n✓ Modül '{$module}' başarıyla kaldırıldı!");
        $this->warn("\n⚠️  Route'ları ve config dosyalarını kontrol etmeyi unutmayın!");

        return Command::SUCCESS;
    }

    /**
     * Modül tablolarını silmek için migration oluştur.
     */
    protected function createDropMigration(string $module, string $modulePascal): void
    {
        $migrationPath = database_path("migrations/{$module}");
        if (! File::exists($migrationPath)) {
            return;
        }

        // Migration dosyalarını oku ve tablo isimlerini bul
        $tables = [];
        $files = File::files($migrationPath);

        foreach ($files as $file) {
            $content = File::get($file->getPathname());
            // Schema::create('table_name') pattern'ini bul
            if (preg_match_all("/Schema::create\(['\"]([^'\"]+)['\"]/", $content, $matches)) {
                $tables = array_merge($tables, $matches[1]);
            }
        }

        if (empty($tables)) {
            $this->warn('  ⚠️  Migration dosyalarında tablo bulunamadı, migration oluşturulmadı.');

            return;
        }

        $timestamp = now()->format('Y_m_d_His');
        $migrationName = "drop_{$module}_tables";
        $migrationFile = database_path("migrations/{$timestamp}_{$migrationName}.php");

        $migrationContent = "<?php\n\n";
        $migrationContent .= "declare(strict_types=1);\n\n";
        $migrationContent .= "use Illuminate\\Database\\Migrations\\Migration;\n";
        $migrationContent .= "use Illuminate\\Support\\Facades\\Schema;\n\n";
        $migrationContent .= "return new class extends Migration\n";
        $migrationContent .= "{\n";
        $migrationContent .= "    public function up(): void\n";
        $migrationContent .= "    {\n";
        foreach (array_reverse($tables) as $table) {
            $migrationContent .= "        Schema::dropIfExists('{$table}');\n";
        }
        $migrationContent .= "    }\n\n";
        $migrationContent .= "    public function down(): void\n";
        $migrationContent .= "    {\n";
        $migrationContent .= "        // Bu migration geri alınamaz\n";
        $migrationContent .= "    }\n";
        $migrationContent .= "};\n";

        File::put($migrationFile, $migrationContent);
        $this->line("  ✓ Migration dosyası oluşturuldu: {$timestamp}_{$migrationName}.php");
    }

    /**
     * config/modules.php'den modülü kaldır.
     */
    protected function removeFromConfig(string $module): void
    {
        $configPath = config_path('modules.php');
        $content = File::get($configPath);

        // 'enabled' array'inden kaldır
        $content = preg_replace(
            "/\s*'{$module}'\s*=>\s*env\([^)]+\),\s*\n/",
            '',
            $content
        );

        // 'namespaces' array'inden kaldır
        $content = preg_replace(
            "/\s*'{$module}'\s*=>\s*[^,]+,?\s*\n/",
            '',
            $content
        );

        // 'route_prefixes' array'inden kaldır
        $content = preg_replace(
            "/\s*'{$module}'\s*=>\s*[^,]+,?\s*\n/",
            '',
            $content
        );

        // 'migration_paths' array'inden kaldır
        $content = preg_replace(
            "/\s*'{$module}'\s*=>\s*[^,]+,?\s*\n/",
            '',
            $content
        );

        File::put($configPath, $content);
        $this->line('  ✓ config/modules.php güncellendi');
    }

    /**
     * bootstrap/providers.php'den ServiceProvider'ı kaldır.
     */
    protected function removeFromProviders(string $modulePascal): void
    {
        $providersPath = base_path('bootstrap/providers.php');
        if (! File::exists($providersPath)) {
            return;
        }

        $content = File::get($providersPath);
        $providerClass = "App\\Providers\\Domains\\{$modulePascal}ServiceProvider::class";

        // Provider'ı kaldır
        $content = preg_replace(
            "/\s*App\\\\Providers\\\\Domains\\\\{$modulePascal}ServiceProvider::class,\s*\n/",
            '',
            $content
        );

        File::put($providersPath, (string) $content);
        $this->line('  ✓ bootstrap/providers.php güncellendi');
    }
}
