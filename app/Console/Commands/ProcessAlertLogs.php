<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\BatchSend5xxErrorAlertMail;
use App\Jobs\BatchSendExceptionAlertMail;
use App\Jobs\BatchSendSlowRequestAlertMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

/**
 * Alert log dosyalarını okuyup batch email gönderir ve dosyaları temizler.
 * Bu yaklaşım job insert'lerini tamamen kaldırır.
 */
class ProcessAlertLogs extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'alerts:process-logs
                            {--min-items=5 : Minimum item sayısı - bu kadar item birikmeden email gönderme}
                            {--debounce-seconds=300 : Aynı item için debounce süresi (saniye)}';

    /**
     * The console command description.
     */
    protected $description = 'Read alert log files (slow requests, 5xx errors, exceptions), send batch emails, and clear log files';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $today = now()->format('Y-m-d');
        $minItems = (int) $this->option('min-items');
        $debounceSeconds = (int) $this->option('debounce-seconds');

        // Slow requests
        $this->processSlowRequests($today, $minItems, $debounceSeconds);

        // 5xx errors
        $this->process5xxErrors($today, $minItems, $debounceSeconds);

        // Exceptions
        $this->processExceptions($today, $minItems, $debounceSeconds);

        return self::SUCCESS;
    }

    /**
     * Slow requests log dosyasını işle.
     */
    protected function processSlowRequests(string $today, int $minItems, int $debounceSeconds): void
    {
        $logPath = storage_path("logs/slow-requests-{$today}.log");

        if (! File::exists($logPath)) {
            return;
        }

        $requests = $this->parseSlowRequestLog($logPath);

        if (empty($requests)) {
            return;
        }

        if (count($requests) < $minItems) {
            $this->info('Found '.count($requests)." slow requests, but minimum is {$minItems}. Skipping email.");

            return;
        }

        $filtered = $this->applyDebouncing($requests, 'slow_request', $debounceSeconds, fn ($r) => md5($r['url'].$r['method']));

        if (empty($filtered)) {
            return;
        }

        $this->info('Processing '.count($requests).' slow requests (after debouncing: '.count($filtered).')...');

        BatchSendSlowRequestAlertMail::dispatch($filtered)->onQueue('emails');
        File::put($logPath, '');

        $this->info('Slow request batch email sent with '.count($filtered).' requests. Log file cleared.');
    }

    /**
     * 5xx errors log dosyasını işle.
     */
    protected function process5xxErrors(string $today, int $minItems, int $debounceSeconds): void
    {
        $logPath = storage_path("logs/5xx-errors-{$today}.log");

        if (! File::exists($logPath)) {
            return;
        }

        $errors = $this->parse5xxErrorLog($logPath);

        if (empty($errors)) {
            return;
        }

        if (count($errors) < $minItems) {
            $this->info('Found '.count($errors)." 5xx errors, but minimum is {$minItems}. Skipping email.");

            return;
        }

        $filtered = $this->applyDebouncing($errors, '5xx_error', $debounceSeconds, fn ($e) => md5($e['exception'].$e['url']));

        if (empty($filtered)) {
            return;
        }

        $this->info('Processing '.count($errors).' 5xx errors (after debouncing: '.count($filtered).')...');

        BatchSend5xxErrorAlertMail::dispatch($filtered)->onQueue('emails');
        File::put($logPath, '');

        $this->info('5xx error batch email sent with '.count($filtered).' errors. Log file cleared.');
    }

    /**
     * Exceptions log dosyasını işle.
     */
    protected function processExceptions(string $today, int $minItems, int $debounceSeconds): void
    {
        $logPath = storage_path("logs/exceptions-{$today}.log");

        if (! File::exists($logPath)) {
            return;
        }

        $exceptions = $this->parseExceptionLog($logPath);

        if (empty($exceptions)) {
            return;
        }

        if (count($exceptions) < $minItems) {
            $this->info('Found '.count($exceptions)." exceptions, but minimum is {$minItems}. Skipping email.");

            return;
        }

        $filtered = $this->applyDebouncing($exceptions, 'exception', $debounceSeconds, fn ($e) => md5($e['exception'].$e['message']));

        if (empty($filtered)) {
            return;
        }

        $this->info('Processing '.count($exceptions).' exceptions (after debouncing: '.count($filtered).')...');

        BatchSendExceptionAlertMail::dispatch($filtered)->onQueue('emails');
        File::put($logPath, '');

        $this->info('Exception batch email sent with '.count($filtered).' exceptions. Log file cleared.');
    }

    protected function parseSlowRequestLog(string $logPath): array
    {
        $content = File::get($logPath);
        $lines = explode("\n", $content);
        $requests = [];

        foreach ($lines as $line) {
            if (empty(trim($line))) {
                continue;
            }

            $jsonStart = strpos($line, '{"method"');
            if ($jsonStart === false) {
                continue;
            }

            $jsonStr = substr($line, $jsonStart);
            $data = json_decode($jsonStr, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($data['method'])) {
                $requests[] = [
                    'method' => $data['method'],
                    'url' => $data['url'],
                    'duration' => $data['duration'] ?? 0.0,
                    'status_code' => $data['status_code'] ?? 200,
                    'ip' => $data['ip'] ?? 'unknown',
                    'user_id' => $data['user_id'] ?? null,
                ];
            }
        }

        return $requests;
    }

    protected function parse5xxErrorLog(string $logPath): array
    {
        $content = File::get($logPath);
        $lines = explode("\n", $content);
        $errors = [];

        foreach ($lines as $line) {
            if (empty(trim($line))) {
                continue;
            }

            $jsonStart = strpos($line, '{"exception"');
            if ($jsonStart === false) {
                continue;
            }

            $jsonStr = substr($line, $jsonStart);
            $data = json_decode($jsonStr, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($data['exception'])) {
                $errors[] = [
                    'exception' => $data['exception'],
                    'message' => $data['message'] ?? '',
                    'status_code' => $data['status_code'] ?? 500,
                    'url' => $data['url'] ?? '',
                    'method' => $data['method'] ?? 'GET',
                    'ip' => $data['ip'] ?? 'unknown',
                    'user_id' => $data['user_id'] ?? null,
                    'file' => $data['file'] ?? '',
                    'line' => $data['line'] ?? 0,
                ];
            }
        }

        return $errors;
    }

    protected function parseExceptionLog(string $logPath): array
    {
        $content = File::get($logPath);
        $lines = explode("\n", $content);
        $exceptions = [];

        foreach ($lines as $line) {
            if (empty(trim($line))) {
                continue;
            }

            $jsonStart = strpos($line, '{"exception"');
            if ($jsonStart === false) {
                continue;
            }

            $jsonStr = substr($line, $jsonStart);
            $data = json_decode($jsonStr, true);

            if (json_last_error() === JSON_ERROR_NONE && isset($data['exception'])) {
                $exceptions[] = [
                    'exception' => $data['exception'],
                    'message' => $data['message'] ?? '',
                    'url' => $data['url'] ?? null,
                    'method' => $data['method'] ?? 'GET',
                    'ip' => $data['ip'] ?? 'unknown',
                    'user_id' => $data['user_id'] ?? null,
                    'file' => $data['file'] ?? '',
                    'line' => $data['line'] ?? 0,
                ];
            }
        }

        return $exceptions;
    }

    protected function applyDebouncing(array $items, string $prefix, int $debounceSeconds, callable $hashFunction): array
    {
        $filtered = [];

        foreach ($items as $item) {
            $hash = $hashFunction($item);
            $cacheKey = "{$prefix}_debounce:{$hash}";

            if (Cache::has($cacheKey)) {
                continue;
            }

            Cache::put($cacheKey, true, $debounceSeconds);
            $filtered[] = $item;
        }

        return $filtered;
    }
}
