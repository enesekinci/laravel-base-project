<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'priority' => $this->priority,
            'completed' => $this->completed,
            'deadline' => $this->deadline?->toIso8601String(),
            'order' => $this->order,
            'recurring_config' => $this->recurring_config,
            'subtasks' => TodoSubtaskResource::collection($this->whenLoaded('subtasks')),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
