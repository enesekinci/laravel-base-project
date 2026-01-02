<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Mail\Batch5xxErrorAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BatchSend5xxErrorAlertMail implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public int $tries = 3;

    public int $timeout = 30;

    public function __construct(
        public array $errors,
    ) {
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        if (empty($this->errors)) {
            return;
        }

        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            logger()->warning('Batch 5xx error alert email not sent: admin_email not configured');

            return;
        }

        Mail::to($adminEmail)->send(
            new Batch5xxErrorAlertMail($this->errors)
        );
    }
}
