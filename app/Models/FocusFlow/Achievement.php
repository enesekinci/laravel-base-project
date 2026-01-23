<?php

declare(strict_types=1);

namespace App\Models\FocusFlow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Achievement',
    title: 'Achievement',
    description: 'Achievement model',
    properties: [
        new OA\Property(property: 'id', type: 'integer', readOnly: true),
        new OA\Property(property: 'name', type: 'string'),
        new OA\Property(property: 'description', type: 'string'),
        new OA\Property(property: 'icon', type: 'string', nullable: true),
        new OA\Property(property: 'condition_type', type: 'string'),
        new OA\Property(property: 'condition_value', type: 'integer'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', readOnly: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', readOnly: true),
    ]
)]
class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'condition_type',
        'condition_value',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\User::class,
            'user_achievements',
            'achievement_id',
            'user_id'
        )->withPivot('unlocked_at')->withTimestamps();
    }
}
