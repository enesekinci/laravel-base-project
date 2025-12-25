<?php

declare(strict_types=1);

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;

/**
 * AfterLocalTime Validation Rule.
 *
 * Bu rule, client timezone'unda bir tarihin belirtilen tarihten sonra olup olmadığını kontrol eder.
 *
 * Kullanım:
 * ```php
 * $request->validate([
 *     'start_date' => ['required', new AfterLocalTime($request)],
 * ]);
 * ```
 *
 * Client timezone header'ı: client-time-zone (örn: "Europe/Istanbul")
 * Client time header'ı: client-time (opsiyonel, yoksa şu anki zaman kullanılır)
 */
class AfterLocalTime implements ValidationRule
{
    protected ?string $clientTime = null;

    protected ?string $timeZoneString = null;

    public function __construct(Request $request)
    {
        // Client timezone'u header'dan al
        $this->timeZoneString = $request->header('client-time-zone');

        // Client time'ı header'dan al (yoksa şu anki zamanı kullan)
        $this->clientTime = $request->header('client-time') ?? now()->toDateTimeString();
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        // Timezone yoksa validation geç (opsiyonel)
        if (! $this->timeZoneString) {
            return;
        }

        try {
            // Value'yu client timezone'unda parse et
            $valueTime = Carbon::parse($value, $this->timeZoneString);

            // Client time'ı client timezone'unda parse et
            $clientTime = Carbon::parse($this->clientTime, $this->timeZoneString);

            // Value, client time'dan önceyse hata ver
            if ($valueTime->lt($clientTime)) {
                $fail(__('validation.after_or_equal', [
                    'date' => $clientTime->format('Y-m-d H:i:s'),
                    'attribute' => $attribute,
                ]))->translate();
            }
        } catch (\Exception $e) {
            // Parse hatası olursa validation geç (format hatası başka rule'da yakalanır)
            return;
        }
    }
}
