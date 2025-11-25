<?php

namespace App\Jobs;

use App\Mail\Error5xxAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class Send5xxErrorAlertMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 30;

    public function __construct(
        public \Throwable $exception,
        public string $url,
        public string $method,
        public string $ip,
        public ?int $userId = null
    ) {
        // Job'un hangi queue'da çalışacağını belirle
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        // Rate limiting: Aynı exception için 5 dakikada bir mail gönder
        $exceptionHash = md5($this->exception->getMessage() . $this->url);
        $cacheKey = "5xx_error_alert:{$exceptionHash}";

        if (Cache::has($cacheKey)) {
            // Son 5 dakika içinde aynı hata için mail gönderilmiş, tekrar gönderme
            return;
        }

        // 5 dakika cache'e kaydet
        Cache::put($cacheKey, true, now()->addMinutes(5));

        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            logger()->warning('5xx error alert email not sent: admin_email not configured');

            return;
        }

        Mail::to($adminEmail)->send(
            new Error5xxAlertMail(
                $this->exception,
                $this->url,
                $this->method,
                $this->ip,
                $this->userId
            )
        );
    }
}
