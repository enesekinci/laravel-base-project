<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Goals;

use App\Models\FocusFlow\Goal;
use App\Services\FocusFlow\GoalService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class GoalsList extends Component
{
    use WithPagination;

    public string $search = '';

    public ?string $type = null;

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
            ['key' => 'type', 'label' => 'Tip'],
            ['key' => 'progress', 'label' => 'İlerleme'],
            ['key' => 'target_date', 'label' => 'Hedef Tarih'],
            ['key' => 'completed', 'label' => 'Durum'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render(GoalService $goalService): View
    {
        $filters = array_filter([
            'type' => $this->type,
            'completed' => $this->completed,
        ]);

        $goals = Goal::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            })
            ->when($this->type, fn ($q) => $q->where('type', $this->type))
            ->when($this->completed !== null, fn ($q) => $q->where('completed', $this->completed))
            ->orderBy('target_date', 'asc')
            ->paginate(15);

        return view('livewire.focusflow.admin.goals.goals-list', [
            'goals' => $goals,
        ]);
    }

    public function delete(int $goalId): void
    {
        $goal = Goal::findOrFail($goalId);
        $goal->delete();

        $this->dispatch('toast', message: 'Hedef silindi.', type: 'success');
    }
}
