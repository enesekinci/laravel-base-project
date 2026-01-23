<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TodoSubtask',
    title: 'TodoSubtask Model',
    description: 'FocusFlow Todo Subtask model',
    required: ['title', 'todo_id'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true, example: 1),
        new OA\Property(property: 'todo_id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Check emails'),
        new OA\Property(property: 'completed', type: 'boolean', example: false),
        new OA\Property(property: 'order', type: 'integer', example: 0),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class TodoSubtask extends Model
{
    use HasFactory;

    protected $fillable = [
        'todo_id',
        'title',
        'completed',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
        ];
    }

    public function todo(): BelongsTo
    {
        return $this->belongsTo(Todo::class);
    }
}
