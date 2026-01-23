<?php

declare(strict_types=1);

namespace App\Services\FocusFlow;

use App\Models\FocusFlow\Todo;
use App\Models\FocusFlow\TodoSubtask;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TodoService
{
    public function getAll(User $user, array $filters = []): Collection
    {
        $query = Todo::where('user_id', $user->id);

        if (isset($filters['completed'])) {
            $query->where('completed', $filters['completed']);
        }

        if (isset($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (isset($filters['priority'])) {
            $query->where('priority', $filters['priority']);
        }

        if (isset($filters['deadline'])) {
            if ($filters['deadline'] === 'today') {
                $query->whereDate('deadline', today());
            } elseif ($filters['deadline'] === 'upcoming') {
                $query->where('deadline', '>', now());
            } elseif ($filters['deadline'] === 'overdue') {
                $query->where('deadline', '<', now())->where('completed', false);
            }
        }

        return $query->orderBy('order')->orderBy('created_at', 'desc')->get();
    }

    public function create(User $user, array $data): Todo
    {
        return DB::transaction(function () use ($user, $data) {
            $todo = Todo::create([
                'user_id' => $user->id,
                'title' => $data['title'],
                'description' => $data['description'] ?? null,
                'category' => $data['category'] ?? 'Kişisel',
                'priority' => $data['priority'] ?? 'Orta',
                'deadline' => $data['deadline'] ?? null,
                'order' => $data['order'] ?? 0,
                'recurring_config' => $data['recurring_config'] ?? null,
            ]);

            if (isset($data['subtasks']) && is_array($data['subtasks'])) {
                foreach ($data['subtasks'] as $index => $subtask) {
                    TodoSubtask::create([
                        'todo_id' => $todo->id,
                        'title' => $subtask['title'],
                        'order' => $subtask['order'] ?? $index,
                    ]);
                }
            }

            return $todo->load('subtasks');
        });
    }

    public function update(Todo $todo, array $data): bool
    {
        return DB::transaction(function () use ($todo, $data) {
            $todo->update([
                'title' => $data['title'] ?? $todo->title,
                'description' => $data['description'] ?? $todo->description,
                'category' => $data['category'] ?? $todo->category,
                'priority' => $data['priority'] ?? $todo->priority,
                'deadline' => $data['deadline'] ?? $todo->deadline,
                'order' => $data['order'] ?? $todo->order,
                'recurring_config' => $data['recurring_config'] ?? $todo->recurring_config,
            ]);

            if (isset($data['subtasks']) && is_array($data['subtasks'])) {
                // Mevcut subtask'ları sil
                $todo->subtasks()->delete();

                // Yeni subtask'ları ekle
                foreach ($data['subtasks'] as $index => $subtask) {
                    TodoSubtask::create([
                        'todo_id' => $todo->id,
                        'title' => $subtask['title'],
                        'completed' => $subtask['completed'] ?? false,
                        'order' => $subtask['order'] ?? $index,
                    ]);
                }
            }

            return true;
        });
    }

    public function complete(Todo $todo): bool
    {
        return DB::transaction(function () use ($todo) {
            $todo->update(['completed' => true]);
            $todo->subtasks()->update(['completed' => true]);

            return true;
        });
    }

    public function reorder(User $user, array $todoIds): bool
    {
        return DB::transaction(function () use ($user, $todoIds) {
            foreach ($todoIds as $order => $todoId) {
                Todo::where('id', $todoId)
                    ->where('user_id', $user->id)
                    ->update(['order' => $order]);
            }

            return true;
        });
    }

    public function delete(Todo $todo): bool
    {
        return $todo->delete();
    }
}
