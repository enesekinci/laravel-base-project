<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date' => $this->date->format('Y-m-d'),
            'completed_todos_count' => $this->completed_todos_count,
            'pomodoro_count' => $this->pomodoro_count,
            'focus_duration_minutes' => $this->focus_duration_minutes,
            'streak_days' => $this->streak_days,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
