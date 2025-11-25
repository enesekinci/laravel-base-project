<?php

namespace App\Jobs;

use App\Mail\SlowRequestAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSlowRequestAlertMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public $timeout = 30;

    public function __construct(
        public string $method,
        public string $url,
        public float $duration,
        public int $statusCode,
        public string $ip,
        public ?int $userId = null
    ) {
        // Job'un hangi queue'da çalışacağını belirle
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            logger()->warning('Slow request alert email not sent: admin_email not configured');

            return;
        }

        Mail::to($adminEmail)->send(
            new SlowRequestAlertMail(
                $this->method,
                $this->url,
                $this->duration,
                $this->statusCode,
                $this->ip,
                $this->userId
            )
        );
    }
}
