<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Pomodoro;

use App\Services\FocusFlow\PomodoroService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PomodoroHistory extends Component
{
    use WithPagination;

    public ?string $date = null;

    public ?string $type = null;

    public function mount(): void
    {
        $this->date = now()->format('Y-m-d');
    }

    public function getHeadersProperty(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'],
            ['key' => 'task_title', 'label' => 'Görev'],
            ['key' => 'start_time', 'label' => 'Başlangıç'],
            ['key' => 'duration', 'label' => 'Süre (dk)'],
            ['key' => 'type', 'label' => 'Tip'],
            ['key' => 'completed', 'label' => 'Durum'],
        ];
    }

    public function render(PomodoroService $pomodoroService): View
    {
        $filters = array_filter([
            'date' => $this->date,
            'type' => $this->type,
        ]);

        $sessions = $pomodoroService->getSessions(auth()->user(), $filters)
            ->paginate(15);

        return view('livewire.focusflow.admin.pomodoro.pomodoro-history', [
            'sessions' => $sessions,
        ]);
    }
}
