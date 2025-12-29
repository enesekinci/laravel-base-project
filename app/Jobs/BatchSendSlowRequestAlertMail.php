<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Mail\BatchSlowRequestAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

/**
 * Birden fazla slow request'i toplayıp tek bir email'de gönderir.
 */
class BatchSendSlowRequestAlertMail implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public int $tries = 3;

    public int $timeout = 30;

    /**
     * @param  array<int, array{method: string, url: string, duration: float, status_code: int, ip: string, user_id: int|null}>  $requests
     */
    public function __construct(
        public array $requests,
    ) {
        $this->onQueue('emails');
    }

    public function handle(): void
    {
        if (empty($this->requests)) {
            return;
        }

        $adminEmail = config('mail.admin_email', config('mail.from.address'));

        if (! $adminEmail) {
            logger()->warning('Batch slow request alert email not sent: admin_email not configured');

            return;
        }

        Mail::to($adminEmail)->send(
            new BatchSlowRequestAlertMail($this->requests)
        );
    }
}
