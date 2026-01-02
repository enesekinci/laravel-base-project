<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Batch5xxErrorAlertMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public array $errors,
    ) {}

    public function envelope(): Envelope
    {
        $count = count($this->errors);

        return new Envelope(
            subject: sprintf(
                '🚨 %d 5xx Server Error Alert%s - %s',
                $count,
                $count > 1 ? 's' : '',
                config('app.name')
            ),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.batch-5xx-error-alert',
            with: [
                'errors' => $this->errors,
                'totalErrors' => count($this->errors),
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
