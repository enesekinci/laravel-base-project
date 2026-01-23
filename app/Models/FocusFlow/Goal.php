<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Goal',
    title: 'Goal Model',
    description: 'FocusFlow Goal model',
    required: ['title', 'user_id', 'type'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true, example: 1),
        new OA\Property(property: 'user_id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Learn Laravel'),
        new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Master the Laravel framework'),
        new OA\Property(property: 'type', type: 'string', enum: ['daily', 'weekly', 'monthly', 'yearly'], example: 'monthly'),
        new OA\Property(property: 'progress', type: 'integer', example: 50, description: 'Progress percentage 0-100'),
        new OA\Property(property: 'start_date', type: 'string', format: 'date', example: '2025-01-01'),
        new OA\Property(property: 'target_date', type: 'string', format: 'date', example: '2025-01-31'),
        new OA\Property(property: 'completed', type: 'boolean', example: false),
        new OA\Property(property: 'notes', type: 'string', nullable: true),
        new OA\Property(property: 'sub_goals', type: 'array', items: new OA\Items(ref: '#/components/schemas/GoalSubGoal')),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class Goal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type',
        'progress',
        'start_date',
        'target_date',
        'completed',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'target_date' => 'date',
            'completed' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subGoals(): HasMany
    {
        return $this->hasMany(GoalSubGoal::class)->orderBy('order');
    }
}
