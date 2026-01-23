<?php

declare(strict_types=1);

namespace App\Services\FocusFlow;

use App\Models\FocusFlow\Goal;
use App\Models\FocusFlow\GoalSubGoal;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class GoalService
{
    public function getAll(User $user, array $filters = []): Collection
    {
        $query = Goal::where('user_id', $user->id);

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['completed'])) {
            $query->where('completed', $filters['completed']);
        }

        return $query->orderBy('target_date', 'asc')->get();
    }

    public function create(User $user, array $data): Goal
    {
        return DB::transaction(function () use ($user, $data) {
            $goal = Goal::create([
                'user_id' => $user->id,
                'title' => $data['title'],
                'description' => $data['description'] ?? null,
                'type' => $data['type'],
                'start_date' => $data['start_date'],
                'target_date' => $data['target_date'] ?? null,
                'notes' => $data['notes'] ?? null,
                'progress' => 0,
            ]);

            if (isset($data['sub_goals']) && is_array($data['sub_goals'])) {
                foreach ($data['sub_goals'] as $index => $subGoal) {
                    GoalSubGoal::create([
                        'goal_id' => $goal->id,
                        'title' => $subGoal['title'],
                        'order' => $subGoal['order'] ?? $index,
                    ]);
                }
            }

            return $goal->load('subGoals');
        });
    }

    public function update(Goal $goal, array $data): bool
    {
        return DB::transaction(function () use ($goal, $data) {
            $goal->update([
                'title' => $data['title'] ?? $goal->title,
                'description' => $data['description'] ?? $goal->description,
                'type' => $data['type'] ?? $goal->type,
                'target_date' => $data['target_date'] ?? $goal->target_date,
                'notes' => $data['notes'] ?? $goal->notes,
                'progress' => $data['progress'] ?? $goal->progress,
            ]);

            if (isset($data['sub_goals']) && is_array($data['sub_goals'])) {
                // Mevcut sub goal'ları sil
                $goal->subGoals()->delete();

                // Yeni sub goal'ları ekle
                foreach ($data['sub_goals'] as $index => $subGoal) {
                    GoalSubGoal::create([
                        'goal_id' => $goal->id,
                        'title' => $subGoal['title'],
                        'completed' => $subGoal['completed'] ?? false,
                        'order' => $subGoal['order'] ?? $index,
                    ]);
                }

                // Progress'i güncelle
                $this->updateProgress($goal);
            }

            return true;
        });
    }

    public function updateProgress(Goal $goal): void
    {
        $subGoals = $goal->subGoals;
        $total = $subGoals->count();
        $completed = $subGoals->where('completed', true)->count();

        if ($total > 0) {
            $progress = (int) (($completed / $total) * 100);
            $goal->update(['progress' => $progress]);

            if ($progress === 100) {
                $goal->update(['completed' => true]);
            }
        }
    }

    public function complete(Goal $goal): bool
    {
        return DB::transaction(function () use ($goal) {
            $goal->update([
                'completed' => true,
                'progress' => 100,
            ]);
            $goal->subGoals()->update(['completed' => true]);

            return true;
        });
    }

    public function delete(Goal $goal): bool
    {
        return $goal->delete();
    }
}
