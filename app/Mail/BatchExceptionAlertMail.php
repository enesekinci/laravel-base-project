<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Birden fazla exception'ı tek bir email'de gösterir.
 */
class BatchExceptionAlertMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @param  array<int, array{exception: string, message: string, url: string|null, method: string, ip: string, user_id: int|null, file: string, line: int}>  $exceptions
     */
    public function __construct(
        public array $exceptions,
    ) {}

    public function envelope(): Envelope
    {
        $count = count($this->exceptions);

        return new Envelope(
            subject: sprintf(
                '🚨 %d Exception Alert%s - %s',
                $count,
                $count > 1 ? 's' : '',
                config('app.name')
            ),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.batch-exception-alert',
            with: [
                'exceptions' => $this->exceptions,
                'totalExceptions' => count($this->exceptions),
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
