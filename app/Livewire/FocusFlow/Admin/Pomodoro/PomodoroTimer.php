<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Pomodoro;

use App\Models\FocusFlow\PomodoroSession;
use App\Services\FocusFlow\PomodoroService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PomodoroTimer extends Component
{
    public ?int $todoId = null;

    public ?string $taskTitle = null;

    public int $duration = 25;

    public bool $isRunning = false;

    public int $remainingSeconds = 1500; // 25 dakika

    public ?PomodoroSession $currentSession = null;

    public function mount(): void
    {
        $this->remainingSeconds = $this->duration * 60;
    }

    public function start(PomodoroService $pomodoroService): void
    {
        if ($this->isRunning) {
            return;
        }

        $data = [
            'duration' => $this->duration,
            'type' => 'work',
        ];

        if ($this->todoId) {
            $data['todo_id'] = $this->todoId;
        } elseif ($this->taskTitle) {
            $data['task_title'] = $this->taskTitle;
        }

        $this->currentSession = $pomodoroService->startSession(auth()->user(), $data);
        $this->isRunning = true;
        $this->remainingSeconds = $this->duration * 60;

        $this->dispatch('toast', message: 'Pomodoro başlatıldı.', type: 'success');
    }

    public function pause(): void
    {
        $this->isRunning = false;
    }

    public function resume(): void
    {
        $this->isRunning = true;
    }

    public function resetTimer(): void
    {
        $this->isRunning = false;
        $this->remainingSeconds = $this->duration * 60;
        $this->currentSession = null;
    }

    public function complete(PomodoroService $pomodoroService): void
    {
        if ($this->currentSession) {
            $pomodoroService->completeSession($this->currentSession);
        }

        $this->resetTimer();
        $this->dispatch('toast', message: 'Pomodoro tamamlandı!', type: 'success');
    }

    public function tick(): void
    {
        if ($this->isRunning && $this->remainingSeconds > 0) {
            $this->remainingSeconds--;

            if ($this->remainingSeconds === 0) {
                $this->complete(app(PomodoroService::class));
            }
        }
    }

    public function render(): View
    {
        return view('livewire.focusflow.admin.pomodoro.pomodoro-timer');
    }
}
