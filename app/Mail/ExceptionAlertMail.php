<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ExceptionAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Throwable $exception,
        public ?string $url = null,
        public ?array $context = []
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🚨 Exception Alert - ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.exception-alert',
            with: [
                'exception' => $this->exception,
                'url' => $this->url ?? request()->fullUrl(),
                'context' => $this->context,
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
