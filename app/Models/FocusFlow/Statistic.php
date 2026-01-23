<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Statistic',
    title: 'Statistic',
    description: 'Statistic model',
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true),
        new OA\Property(property: 'user_id', type: 'integer'),
        new OA\Property(property: 'date', type: 'string', format: 'date'),
        new OA\Property(property: 'completed_todos_count', type: 'integer'),
        new OA\Property(property: 'pomodoro_count', type: 'integer'),
        new OA\Property(property: 'focus_duration_minutes', type: 'integer'),
        new OA\Property(property: 'streak_days', type: 'integer'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'completed_todos_count',
        'pomodoro_count',
        'focus_duration_minutes',
        'streak_days',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
