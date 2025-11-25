<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SlowQueryAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $sql,
        public float $time,
        /** @var array<int, mixed> */
        public array $bindings
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚠️ Slow Query Alert - ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.slow-query-alert',
            with: [
                'sql' => $this->sql,
                'time' => $this->time,
                'bindings' => $this->bindings,
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
