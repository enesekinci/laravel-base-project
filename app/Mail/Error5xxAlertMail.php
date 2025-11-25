<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Error5xxAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public \Throwable $exception,
        public string $url,
        public string $method,
        public string $ip,
        public ?int $userId = null
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🚨 5xx Server Error Alert - '.config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.5xx-error-alert',
            with: [
                'exception' => $this->exception,
                'url' => $this->url,
                'method' => $this->method,
                'ip' => $this->ip,
                'userId' => $this->userId,
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
