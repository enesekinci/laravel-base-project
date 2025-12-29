<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Birden fazla slow request'i tek bir email'de gösterir.
 */
class BatchSlowRequestAlertMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @param  array<int, array{method: string, url: string, duration: float, status_code: int, ip: string, user_id: int|null}>  $requests
     */
    public function __construct(
        public array $requests,
    ) {
        // Requests'i süreye göre sırala (en yavaştan en hızlıya)
        usort($this->requests, fn ($a, $b) => $b['duration'] <=> $a['duration']);
    }

    public function envelope(): Envelope
    {
        $count = count($this->requests);
        $maxDuration = max(array_column($this->requests, 'duration'));

        return new Envelope(
            subject: sprintf(
                '⚠️ %d Slow Request Alert%s - %s (Max: %.2f ms)',
                $count,
                $count > 1 ? 's' : '',
                config('app.name'),
                $maxDuration
            ),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.batch-slow-request-alert',
            with: [
                'requests' => $this->requests,
                'totalRequests' => count($this->requests),
                'totalDuration' => array_sum(array_column($this->requests, 'duration')),
                'maxDuration' => max(array_column($this->requests, 'duration')),
                'avgDuration' => array_sum(array_column($this->requests, 'duration')) / count($this->requests),
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
