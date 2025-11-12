<?php

namespace App\Console\Commands;

use App\Services\StoreSettingService;
use App\Services\TcmbCurrencyService;
use Illuminate\Console\Command;

class UpdateCurrencyRatesCommand extends Command
{
    protected $signature = 'currency:update-rates';

    protected $description = 'TCMB\'den güncel kurları çeker ve veritabanını günceller';

    public function __construct(
        private TcmbCurrencyService $tcmbCurrencyService,
        private StoreSettingService $storeSettingService
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        // Otomatik güncelleme açık mı kontrol et
        $autoUpdateEnabled = $this->storeSettingService->get('auto_currency_update_enabled', false);

        if (!$autoUpdateEnabled) {
            $this->info('Otomatik kur güncelleme kapalı. Ayarlardan açabilirsiniz.');
            return Command::SUCCESS;
        }

        $this->info('TCMB\'den kurlar güncelleniyor...');

        $success = $this->tcmbCurrencyService->updateExchangeRates();

        if ($success) {
            $this->info('Kurlar başarıyla güncellendi.');
            return Command::SUCCESS;
        }

        $this->error('Kur güncelleme başarısız oldu. Log dosyalarını kontrol edin.');
        return Command::FAILURE;
    }
}
