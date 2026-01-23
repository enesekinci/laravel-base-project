<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Reminders;

use App\Models\FocusFlow\Reminder;
use App\Services\FocusFlow\ReminderService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ReminderList extends Component
{
    use WithPagination;

    public string $search = '';

    public ?bool $completed = null;

    public function mount(): void
    {
        //
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function getHeadersProperty(): array
    {
        return [
            ['key' => 'id', 'label' => 'ID', 'class' => 'w-16'],
            ['key' => 'title', 'label' => 'Başlık'],
            ['key' => 'datetime', 'label' => 'Tarih/Saat'],
            ['key' => 'priority', 'label' => 'Öncelik'],
            ['key' => 'completed', 'label' => 'Durum'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render(ReminderService $reminderService): View
    {
        $filters = array_filter([
            'completed' => $this->completed,
        ]);

        $reminders = Reminder::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            })
            ->when($this->completed !== null, fn ($q) => $q->where('completed', $this->completed))
            ->orderBy('datetime')
            ->paginate(15);

        return view('livewire.focusflow.admin.reminders.reminder-list', [
            'reminders' => $reminders,
        ]);
    }

    public function delete(int $reminderId): void
    {
        $reminder = Reminder::findOrFail($reminderId);
        $reminder->delete();

        $this->dispatch('toast', message: 'Hatırlatıcı silindi.', type: 'success');
    }
}
