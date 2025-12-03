<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Locale'i request'ten al (query parameter veya header)
        $locale = $request->query('locale')
            ?? $request->header('Accept-Language')
            ?? config('app.locale', 'tr');

        // Desteklenen locale'ler
        $supportedLocales = ['tr', 'en'];

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
