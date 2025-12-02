<?php

namespace App\Providers;

use App\Jobs\SendSlowQueryAlertMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class DatabaseMonitoringServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * Slow SQL query monitoring - Yavaş sorguları tespit eder,
     * log'a yazar ve e-posta ile bildirim gönderir.
     */
    public function boot(): void
    {
        // Slow SQL threshold (configurable via env)
        $slowQueryThreshold = config('database.slow_query_threshold_ms', 500);

        DB::whenQueryingForLongerThan($slowQueryThreshold, function ($connection, $event) {
            // Slow SQL log channel'a yaz
            Log::channel('slow-sql')->warning('Slow query detected', [
                'sql' => $event->sql,
                'time' => $event->time,
                'bindings' => $event->bindings,
                'connection' => $connection->getName(),
            ]);

            // Kuyruğa mail job'ı ekle
            SendSlowQueryAlertMail::dispatch(
                $event->sql,
                $event->time,
                $event->bindings
            )->onQueue('emails');
        });
    }
}
