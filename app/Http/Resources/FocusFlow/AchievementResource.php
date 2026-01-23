<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'icon' => $this->icon,
            'condition_type' => $this->condition_type,
            'condition_value' => $this->condition_value,
            'unlocked_at' => $this->whenPivotLoaded('user_achievements', function () {
                return $this->pivot->unlocked_at?->toIso8601String();
            }),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
