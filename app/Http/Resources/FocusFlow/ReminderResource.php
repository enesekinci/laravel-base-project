<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'datetime' => $this->datetime->toIso8601String(),
            'priority' => $this->priority,
            'category' => $this->category,
            'recurring_config' => $this->recurring_config,
            'completed' => $this->completed,
            'snoozed_until' => $this->snoozed_until?->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
