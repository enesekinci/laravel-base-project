<?php

namespace App\Jobs;

use App\Mail\SlowQueryAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSlowQueryAlertMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 30;

    public function __construct(
        public string $sql,
        public float $time,
        /** @var array<int, mixed> */
        public array $bindings
    ) {
        // Job'un hangi queue'da çalışacağını belirle
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            logger()->warning('Slow query alert email not sent: admin_email not configured');

            return;
        }

        Mail::to($adminEmail)->send(
            new SlowQueryAlertMail($this->sql, $this->time, $this->bindings)
        );
    }
}
