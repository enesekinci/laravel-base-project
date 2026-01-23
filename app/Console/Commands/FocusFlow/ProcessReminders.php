<?php

declare(strict_types=1);

namespace App\Console\Commands\FocusFlow;

use App\Models\FocusFlow\Reminder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class ProcessReminders extends Command
{
    protected $signature = 'focusflow:process-reminders';

    protected $description = 'Process reminders and send notifications';

    public function handle(): int
    {
        $now = now();

        $reminders = Reminder::where('completed', false)
            ->where('datetime', '<=', $now)
            ->where(function ($query) use ($now) {
                $query->whereNull('snoozed_until')
                    ->orWhere('snoozed_until', '<=', $now);
            })
            ->with('user')
            ->get();

        foreach ($reminders as $reminder) {
            // Burada bildirim gönderilebilir (Notification, Web Push, vb.)
            // Şimdilik sadece log
            $this->info("Reminder: {$reminder->title} for user {$reminder->user_id}");

            // Eğer tekrarlayan değilse tamamlandı olarak işaretle
            if (! ($reminder->recurring_config['enabled'] ?? false)) {
                $reminder->update(['completed' => true]);
            } else {
                // Tekrarlayan hatırlatıcı için bir sonraki tarihi hesapla
                $nextDate = $this->calculateNextDate($reminder->recurring_config, $reminder->datetime);
                $reminder->update(['datetime' => $nextDate]);
            }
        }

        $this->info("Processed {$reminders->count()} reminders.");

        return Command::SUCCESS;
    }

    protected function calculateNextDate(array $config, Carbon $currentDate): Carbon
    {
        return match ($config['frequency'] ?? 'daily') {
            'daily' => $currentDate->copy()->addDay(),
            'weekly' => $currentDate->copy()->addWeek(),
            'monthly' => $currentDate->copy()->addMonth(),
            default => $currentDate->copy()->addDay(),
        };
    }
}
