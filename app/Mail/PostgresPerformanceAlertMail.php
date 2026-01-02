<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostgresPerformanceAlertMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public array $metrics,
        public array $issues,
    ) {}

    public function envelope(): Envelope
    {
        $issuesCount = \count($this->issues);
        $criticalCount = \count(array_filter($this->issues, fn ($issue) => $issue['severity'] === 'critical'));

        $subject = match (true) {
            $criticalCount > 0 => "🔴 PostgreSQL Kritik Performans Sorunları ({$criticalCount}) - ".config('app.name'),
            $issuesCount > 0 => "⚠️ PostgreSQL Performans Uyarıları ({$issuesCount}) - ".config('app.name'),
            default => '📊 PostgreSQL Performans Raporu - '.config('app.name'),
        };

        return new Envelope(
            subject: $subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.postgres-performance-alert',
            with: [
                'metrics' => $this->metrics,
                'issues' => $this->issues,
                'appName' => config('app.name'),
                'appUrl' => config('app.url'),
            ],
        );
    }
}
