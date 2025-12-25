<?php

declare(strict_types=1);

namespace App\Listeners;

use Laravel\Octane\Events\WorkerStarting;

class PreloadOctaneServices
{
    /**
     * Handle the event.
     * Worker başladığında ağır servisleri preload eder.
     */
    public function handle(WorkerStarting $event): void
    {
        // Ağır servisleri preload et
        // Örnek: app()->make(\App\Services\SomeHeavyService::class);

        // Cache driver'ı preload et
        cache()->get('octane-booted', fn () => cache()->put('octane-booted', true, 3600));
    }
}
