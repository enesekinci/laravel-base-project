<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PomodoroSetting',
    title: 'PomodoroSetting Model',
    description: 'FocusFlow Pomodoro Setting model',
    required: ['user_id'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true, example: 1),
        new OA\Property(property: 'user_id', type: 'integer', example: 1),
        new OA\Property(property: 'work_duration', type: 'integer', example: 25),
        new OA\Property(property: 'short_break_duration', type: 'integer', example: 5),
        new OA\Property(property: 'long_break_duration', type: 'integer', example: 15),
        new OA\Property(property: 'pomodoros_until_long_break', type: 'integer', example: 4),
        new OA\Property(property: 'auto_start_breaks', type: 'boolean', example: false),
        new OA\Property(property: 'auto_start_pomodoros', type: 'boolean', example: false),
        new OA\Property(property: 'sound_enabled', type: 'boolean', example: true),
        new OA\Property(property: 'notification_enabled', type: 'boolean', example: true),
        new OA\Property(property: 'sound_volume', type: 'number', format: 'float', example: 0.7),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class PomodoroSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_duration',
        'short_break_duration',
        'long_break_duration',
        'pomodoros_until_long_break',
        'auto_start_breaks',
        'auto_start_pomodoros',
        'sound_enabled',
        'notification_enabled',
        'sound_volume',
    ];

    protected function casts(): array
    {
        return [
            'auto_start_breaks' => 'boolean',
            'auto_start_pomodoros' => 'boolean',
            'sound_enabled' => 'boolean',
            'notification_enabled' => 'boolean',
            'sound_volume' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
