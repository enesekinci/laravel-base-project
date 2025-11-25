<?php

namespace App\Jobs;

use App\Mail\ExceptionAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendExceptionAlertMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public $timeout = 30;

    public function __construct(
        public Throwable $exception,
        public ?string $url = null,
        public ?array $context = []
    ) {
        // Job'un hangi queue'da çalışacağını belirle
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            logger()->warning('Exception alert email not sent: admin_email not configured');

            return;
        }

        Mail::to($adminEmail)->send(
            new ExceptionAlertMail($this->exception, $this->url, $this->context)
        );
    }
}
