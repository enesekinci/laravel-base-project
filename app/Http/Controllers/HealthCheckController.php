<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class HealthCheckController extends Controller
{
    public function detailed(): JsonResponse
    {
        $checks = [
            'database' => $this->checkDatabase(),
            'redis' => $this->checkRedis(),
            'queue' => $this->checkQueue(),
            'disk' => $this->checkDisk(),
            'memory' => $this->checkMemory(),
        ];

        $allHealthy = collect($checks)->every(fn ($check) => $check['status'] === 'healthy');

        return response()->json([
            'status' => $allHealthy ? 'healthy' : 'degraded',
            'checks' => $checks,
            'timestamp' => now()->toIso8601String(),
        ], $allHealthy ? 200 : 503);
    }

    /**
     * @return array{status: string, message: string}
     */
    private function checkDatabase(): array
    {
        try {
            DB::connection()->getPdo();
            $status = 'healthy';
            $message = 'Database connection successful';
        } catch (\Exception $e) {
            $status = 'unhealthy';
            $message = 'Database connection failed: '.$e->getMessage();
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }

    /**
     * @return array{status: string, message: string}
     */
    private function checkRedis(): array
    {
        try {
            if (config('cache.default') === 'redis') {
                Redis::connection()->ping();
                $status = 'healthy';
                $message = 'Redis connection successful';
            } else {
                $status = 'skipped';
                $message = 'Redis not configured';
            }
        } catch (\Exception $e) {
            $status = 'unhealthy';
            $message = 'Redis connection failed: '.$e->getMessage();
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }

    /**
     * @return array{status: string, message: string}
     */
    private function checkQueue(): array
    {
        try {
            // Queue worker status kontrolü (basit)
            $failedJobs = DB::table('failed_jobs')->count();
            $status = 'healthy';
            $message = "Queue system operational. Failed jobs: {$failedJobs}";
        } catch (\Exception $e) {
            $status = 'unhealthy';
            $message = 'Queue check failed: '.$e->getMessage();
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }

    /**
     * @return array{status: string, message: string}
     */
    private function checkDisk(): array
    {
        try {
            $freeBytes = disk_free_space(storage_path());
            $totalBytes = disk_total_space(storage_path());
            $usedPercent = (($totalBytes - $freeBytes) / $totalBytes) * 100;

            $status = $usedPercent > 90 ? 'unhealthy' : ($usedPercent > 80 ? 'warning' : 'healthy');
            $message = sprintf(
                'Disk usage: %.2f%% (%.2f GB free of %.2f GB)',
                $usedPercent,
                $freeBytes / (1024 ** 3),
                $totalBytes / (1024 ** 3)
            );
        } catch (\Exception $e) {
            $status = 'unhealthy';
            $message = 'Disk check failed: '.$e->getMessage();
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }

    /**
     * @return array{status: string, message: string}
     */
    private function checkMemory(): array
    {
        try {
            $memoryUsage = memory_get_usage(true);
            $memoryPeak = memory_get_peak_usage(true);
            $memoryLimit = ini_get('memory_limit');
            $memoryLimitBytes = $this->convertToBytes($memoryLimit);

            $usagePercent = ($memoryUsage / $memoryLimitBytes) * 100;

            $status = $usagePercent > 90 ? 'unhealthy' : ($usagePercent > 80 ? 'warning' : 'healthy');
            $message = sprintf(
                'Memory usage: %.2f%% (%.2f MB / %s)',
                $usagePercent,
                $memoryUsage / (1024 ** 2),
                $memoryLimit
            );
        } catch (\Exception $e) {
            $status = 'unhealthy';
            $message = 'Memory check failed: '.$e->getMessage();
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }

    private function convertToBytes(string $value): int
    {
        $value = trim($value);
        $last = strtolower($value[strlen($value) - 1]);
        $value = (int) $value;

        return match ($last) {
            'g' => $value * 1024 ** 3,
            'm' => $value * 1024 ** 2,
            'k' => $value * 1024,
            default => $value,
        };
    }
}
