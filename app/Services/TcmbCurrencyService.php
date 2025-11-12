<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TcmbCurrencyService
{
    private const TCMB_API_URL = 'https://www.tcmb.gov.tr/kurlar/today.xml';

    /**
     * TCMB'den güncel kurları çeker ve veritabanını günceller
     */
    public function updateExchangeRates(): bool
    {
        try {
            $response = Http::timeout(10)->get(self::TCMB_API_URL);

            if (!$response->successful()) {
                Log::warning('TCMB API yanıt vermedi', [
                    'status' => $response->status(),
                ]);
                return false;
            }

            $xml = simplexml_load_string($response->body());

            if ($xml === false) {
                Log::error('TCMB XML parse hatası');
                return false;
            }

            $updated = 0;

            // TRY bazlı kurları güncelle
            foreach ($xml->Currency as $currency) {
                $code = (string) $currency['CurrencyCode'];
                $forexBuying = (float) $currency->ForexBuying;
                $forexSelling = (float) $currency->ForexSelling;

                // Ortalama kur (alış ve satış ortalaması)
                $rate = ($forexBuying + $forexSelling) / 2;

                if ($rate > 0) {
                    $currencyModel = Currency::where('code', $code)->first();

                    if ($currencyModel && !$currencyModel->is_default) {
                        // TRY'ye göre kur (TRY = 1)
                        // TCMB'den gelen kur zaten TRY bazlı
                        $currencyModel->update([
                            'exchange_rate' => $rate,
                        ]);
                        $updated++;
                    }
                }
            }

            Log::info('TCMB kurları güncellendi', [
                'updated_count' => $updated,
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('TCMB kur güncelleme hatası', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return false;
        }
    }

    /**
     * Belirli bir para biriminin kurunu günceller
     */
    public function updateCurrencyRate(string $currencyCode): ?float
    {
        try {
            $response = Http::timeout(10)->get(self::TCMB_API_URL);

            if (!$response->successful()) {
                return null;
            }

            $xml = simplexml_load_string($response->body());

            if ($xml === false) {
                return null;
            }

            foreach ($xml->Currency as $currency) {
                $code = (string) $currency['CurrencyCode'];

                if ($code === $currencyCode) {
                    $forexBuying = (float) $currency->ForexBuying;
                    $forexSelling = (float) $currency->ForexSelling;
                    $rate = ($forexBuying + $forexSelling) / 2;

                    if ($rate > 0) {
                        $currencyModel = Currency::where('code', $code)->first();

                        if ($currencyModel && !$currencyModel->is_default) {
                            $currencyModel->update([
                                'exchange_rate' => $rate,
                            ]);

                            return $rate;
                        }
                    }
                }
            }

            return null;
        } catch (\Exception $e) {
            Log::error('TCMB kur güncelleme hatası', [
                'currency_code' => $currencyCode,
                'message' => $e->getMessage(),
            ]);

            return null;
        }
    }
}
