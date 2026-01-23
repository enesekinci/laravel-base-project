<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Todos;

use App\Models\FocusFlow\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public string $search = '';

    public ?string $category = null;

    public ?string $priority = null;

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
            ['key' => 'category', 'label' => 'Kategori'],
            ['key' => 'priority', 'label' => 'Öncelik'],
            ['key' => 'deadline', 'label' => 'Son Tarih'],
            ['key' => 'completed', 'label' => 'Durum'],
            ['key' => 'actions', 'label' => 'İşlemler', 'class' => 'w-24'],
        ];
    }

    public function render(): View
    {
        $filters = array_filter([
            'completed' => $this->completed,
            'category' => $this->category,
            'priority' => $this->priority,
        ]);

        $todos = Todo::where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('description', 'like', '%'.$this->search.'%');
            })
            ->when($this->completed !== null, fn ($q) => $q->where('completed', $this->completed))
            ->when($this->category, fn ($q) => $q->where('category', $this->category))
            ->when($this->priority, fn ($q) => $q->where('priority', $this->priority))
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.focusflow.admin.todos.todo-list', [
            'todos' => $todos,
        ]);
    }

    public function delete(int $todoId): void
    {
        $todo = Todo::findOrFail($todoId);
        $todo->delete();

        $this->dispatch('toast', message: 'Görev başarıyla silindi.', type: 'success');
    }

    public function toggleComplete(int $todoId): void
    {
        $todo = Todo::findOrFail($todoId);
        $todo->update(['completed' => ! $todo->completed]);

        $this->dispatch('toast', message: 'Görev durumu güncellendi.', type: 'success');
    }
}
