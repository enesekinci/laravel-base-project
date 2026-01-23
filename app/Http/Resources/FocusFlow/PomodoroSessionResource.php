<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class PomodoroSessionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'todo_id' => $this->todo_id,
            'task_title' => $this->task_title,
            'start_time' => $this->start_time->toIso8601String(),
            'end_time' => $this->end_time?->toIso8601String(),
            'duration' => $this->duration,
            'type' => $this->type,
            'completed' => $this->completed,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
