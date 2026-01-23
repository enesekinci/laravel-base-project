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
    schema: 'Todo',
    title: 'Todo Model',
    description: 'FocusFlow Todo model',
    required: ['title', 'user_id'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true, example: 1),
        new OA\Property(property: 'user_id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Buy milk'),
        new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Go to the grocery store'),
        new OA\Property(property: 'category', type: 'string', example: 'Shopping'),
        new OA\Property(property: 'priority', type: 'string', enum: ['Düşük', 'Orta', 'Yüksek', 'Kritik'], example: 'Orta'),
        new OA\Property(property: 'completed', type: 'boolean', example: false),
        new OA\Property(property: 'deadline', type: 'string', format: 'date-time', nullable: true),
        new OA\Property(property: 'order', type: 'integer', example: 0),
        new OA\Property(property: 'subtasks', type: 'array', items: new OA\Items(ref: '#/components/schemas/TodoSubtask')),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'priority',
        'completed',
        'deadline',
        'order',
        'recurring_config',
    ];

    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
            'deadline' => 'datetime',
            'recurring_config' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subtasks(): HasMany
    {
        return $this->hasMany(TodoSubtask::class)->orderBy('order');
    }

    public function pomodoroSessions(): HasMany
    {
        return $this->hasMany(PomodoroSession::class);
    }
}
