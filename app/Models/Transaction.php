<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method_id',
        'gateway',
        'gateway_transaction_id',
        'type',
        'status',
        'amount',
        'currency',
        'request_payload',
        'response_payload',
        'message',
        'processed_at',
    ];

    protected $casts = [
        'amount'           => 'float',
        'request_payload'  => 'array',
        'response_payload' => 'array',
        'processed_at'     => 'datetime',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}

