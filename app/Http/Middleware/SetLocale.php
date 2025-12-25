<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        // Desteklenen locale'ler (config'den al veya default)
        $supportedLocales = config('app.supported_locales', ['tr', 'en']);

        // Locale'i şu sırayla kontrol et:
        // 1. user-lang header (API için)
        // 2. locale query parameter
        // 3. Accept-Language header
        // 4. Default locale (config'den)
        $locale = $request->header('user-lang')
            ?? $request->query('locale')
            ?? $this->extractLocaleFromAcceptLanguage($request->header('Accept-Language'))
            ?? config('app.locale', 'tr');

        // Desteklenen locale'ler içinde mi kontrol et
        if (\in_array($locale, $supportedLocales, true)) {
            App::setLocale($locale);
        } else {
            // Desteklenmeyen locale ise default locale kullan
            App::setLocale(config('app.locale', 'tr'));
        }

        return $next($request);
    }

    /**
     * Accept-Language header'ından locale çıkar
     * Örnek: "tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7" -> "tr".
     */
    protected function extractLocaleFromAcceptLanguage(?string $acceptLanguage): ?string
    {
        if (! $acceptLanguage) {
            return null;
        }

        // İlk dil kodunu al (örn: "tr-TR" -> "tr")
        $parts = explode(',', $acceptLanguage);
        $firstLanguage = trim($parts[0] ?? '');

        // Dil kodunu çıkar (örn: "tr-TR" -> "tr")
        $locale = explode('-', $firstLanguage)[0] ?? null;

        return $locale ? strtolower($locale) : null;
    }
}
