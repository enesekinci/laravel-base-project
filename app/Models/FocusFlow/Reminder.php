<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Reminder',
    title: 'Reminder Model',
    description: 'FocusFlow Reminder model',
    required: ['title', 'user_id', 'datetime'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true, example: 1),
        new OA\Property(property: 'user_id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string', example: 'Take medicine'),
        new OA\Property(property: 'description', type: 'string', nullable: true, example: 'Health is priority'),
        new OA\Property(property: 'datetime', type: 'string', format: 'date-time', example: '2025-01-21T14:30:00Z'),
        new OA\Property(property: 'priority', type: 'string', enum: ['Düşük', 'Orta', 'Yüksek', 'Kritik'], example: 'Orta'),
        new OA\Property(property: 'category', type: 'string', example: 'Sağlık'),
        new OA\Property(property: 'completed', type: 'boolean', example: false),
        new OA\Property(property: 'snoozed_until', type: 'string', format: 'date-time', nullable: true),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class Reminder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'datetime',
        'priority',
        'category',
        'recurring_config',
        'completed',
        'snoozed_until',
    ];

    protected function casts(): array
    {
        return [
            'datetime' => 'datetime',
            'snoozed_until' => 'datetime',
            'recurring_config' => 'array',
            'completed' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
