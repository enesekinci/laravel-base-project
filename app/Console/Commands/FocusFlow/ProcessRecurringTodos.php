<?php

declare(strict_types=1);

namespace App\Console\Commands\FocusFlow;

use App\Models\FocusFlow\Todo;
use App\Services\FocusFlow\TodoService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ProcessRecurringTodos extends Command
{
    protected $signature = 'focusflow:process-recurring-todos';

    protected $description = 'Process recurring todos and create new instances';

    public function __construct(
        protected TodoService $todoService
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('Processing recurring todos...');

        $recurringTodos = Todo::where('completed', true)
            ->whereNotNull('recurring_config')
            ->get();

        $created = 0;

        foreach ($recurringTodos as $todo) {
            $config = $todo->recurring_config;
            if (! $config || ! ($config['enabled'] ?? false)) {
                continue;
            }

            $lastCompleted = isset($config['lastCompleted'])
                ? Carbon::parse($config['lastCompleted'])
                : $todo->updated_at;

            $shouldCreate = false;

            switch ($config['frequency'] ?? 'daily') {
                case 'daily':
                    $shouldCreate = $lastCompleted->isBefore(now()->startOfDay());
                    break;
                case 'weekly':
                    $shouldCreate = $lastCompleted->isBefore(now()->startOfWeek());
                    break;
                case 'monthly':
                    $shouldCreate = $lastCompleted->isBefore(now()->startOfMonth());
                    break;
                case 'custom':
                    $interval = $config['interval'] ?? 1;
                    $shouldCreate = $lastCompleted->addDays($interval)->isBefore(now());
                    break;
            }

            if ($shouldCreate) {
                $newTodo = $this->todoService->create($todo->user, [
                    'title' => $todo->title,
                    'description' => $todo->description,
                    'category' => $todo->category,
                    'priority' => $todo->priority,
                    'deadline' => $this->calculateDeadline($config, $todo->deadline),
                    'recurring_config' => $config,
                    'subtasks' => $todo->subtasks->map(fn ($s) => [
                        'title' => $s->title,
                        'completed' => false,
                    ])->toArray(),
                ]);

                $config['lastCompleted'] = now()->toIso8601String();
                $todo->update(['recurring_config' => $config]);

                $created++;
            }
        }

        $this->info("Created {$created} new recurring todos.");

        return Command::SUCCESS;
    }

    protected function calculateDeadline(array $config, ?\Carbon\Carbon $originalDeadline): ?\Carbon\Carbon
    {
        if (! $originalDeadline) {
            return null;
        }

        $interval = $config['interval'] ?? 1;

        return match ($config['frequency'] ?? 'daily') {
            'daily' => $originalDeadline->copy()->addDays($interval),
            'weekly' => $originalDeadline->copy()->addWeeks($interval),
            'monthly' => $originalDeadline->copy()->addMonths($interval),
            default => $originalDeadline->copy()->addDays($interval),
        };
    }
}
