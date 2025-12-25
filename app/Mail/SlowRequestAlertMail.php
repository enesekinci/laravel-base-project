<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SlowRequestAlertMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public string $method,
        public string $url,
        public float $duration,
        public int $statusCode,
        public string $ip,
        public ?int $userId = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚠️ Slow Request Alert - '.config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.slow-request-alert',
            with: [
                'method' => $this->method,
                'url' => $this->url,
                'duration' => $this->duration,
                'statusCode' => $this->statusCode,
                'ip' => $this->ip,
                'userId' => $this->userId,
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
