<?php

declare(strict_types=1);

namespace App\Livewire\FocusFlow\Admin\Todos;

use App\Models\FocusFlow\Todo;
use App\Services\FocusFlow\TodoService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TodoForm extends Component
{
    public ?int $todoId = null;

    public string $title = '';

    public ?string $description = null;

    public string $category = 'Kişisel';

    public string $priority = 'Orta';

    public ?string $deadline = null;

    public array $subtasks = [];

    public function mount(?int $todoId = null): void
    {
        if ($todoId) {
            $todo = Todo::findOrFail($todoId);
            $this->todoId = $todo->id;
            $this->title = $todo->title;
            $this->description = $todo->description;
            $this->category = $todo->category;
            $this->priority = $todo->priority;
            $this->deadline = $todo->deadline?->format('Y-m-d\TH:i');
            $this->subtasks = $todo->subtasks->map(fn ($s) => [
                'id' => $s->id,
                'title' => $s->title,
                'completed' => $s->completed,
            ])->toArray();
        }
    }

    public function addSubtask(): void
    {
        $this->subtasks[] = ['title' => '', 'completed' => false];
    }

    public function removeSubtask(int $index): void
    {
        unset($this->subtasks[$index]);
        $this->subtasks = array_values($this->subtasks);
    }

    public function save(TodoService $todoService): void
    {
        $data = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['required', 'string'],
            'priority' => ['required', 'in:Düşük,Orta,Yüksek,Kritik'],
            'deadline' => ['nullable', 'date'],
            'subtasks' => ['nullable', 'array'],
        ]);

        if ($this->todoId) {
            $todo = Todo::findOrFail($this->todoId);
            $todoService->update($todo, $data);
            $this->dispatch('toast', message: 'Görev güncellendi.', type: 'success');
        } else {
            $todoService->create(auth()->user(), $data);
            $this->dispatch('toast', message: 'Görev oluşturuldu.', type: 'success');
        }

        $this->redirect(route('admin.focusflow.todos.index'));
    }

    public function render(): View
    {
        return view('livewire.focusflow.admin.todos.todo-form');
    }
}
