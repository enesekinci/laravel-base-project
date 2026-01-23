<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'PomodoroSession',
    title: 'PomodoroSession Model',
    description: 'FocusFlow Pomodoro Session model',
    required: ['user_id', 'duration', 'type'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true, example: 1),
        new OA\Property(property: 'user_id', type: 'integer', example: 1),
        new OA\Property(property: 'todo_id', type: 'integer', nullable: true, example: 1),
        new OA\Property(property: 'task_title', type: 'string', nullable: true, example: 'Development'),
        new OA\Property(property: 'start_time', type: 'string', format: 'date-time', example: '2025-01-21T10:00:00Z'),
        new OA\Property(property: 'end_time', type: 'string', format: 'date-time', nullable: true),
        new OA\Property(property: 'duration', type: 'integer', example: 25),
        new OA\Property(property: 'type', type: 'string', enum: ['work', 'short-break', 'long-break'], example: 'work'),
        new OA\Property(property: 'completed', type: 'boolean', example: false),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class PomodoroSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'todo_id',
        'task_title',
        'start_time',
        'end_time',
        'duration',
        'type',
        'completed',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'completed' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function todo(): BelongsTo
    {
        return $this->belongsTo(Todo::class);
    }
}
