<?php

declare(strict_types=1);

namespace App\Http\Resources\FocusFlow;

use Illuminate\Http\Resources\Json\JsonResource;

class PomodoroSettingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'work_duration' => $this->work_duration,
            'short_break_duration' => $this->short_break_duration,
            'long_break_duration' => $this->long_break_duration,
            'pomodoros_until_long_break' => $this->pomodoros_until_long_break,
            'auto_start_breaks' => $this->auto_start_breaks,
            'auto_start_pomodoros' => $this->auto_start_pomodoros,
            'sound_enabled' => $this->sound_enabled,
            'notification_enabled' => $this->notification_enabled,
            'sound_volume' => (float) $this->sound_volume,
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
