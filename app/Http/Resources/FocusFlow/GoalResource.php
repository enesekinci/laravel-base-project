<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class GoalResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'progress' => $this->progress,
            'start_date' => $this->start_date->format('Y-m-d'),
            'target_date' => $this->target_date?->format('Y-m-d'),
            'completed' => $this->completed,
            'notes' => $this->notes,
            'sub_goals' => GoalSubGoalResource::collection($this->whenLoaded('subGoals')),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
