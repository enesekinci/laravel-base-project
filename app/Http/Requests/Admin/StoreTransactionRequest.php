<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'order_id' => ['nullable', 'exists:orders,id'],
            'payment_method_id' => ['nullable', 'exists:payment_methods,id'],
            'gateway' => ['nullable', 'string', 'max:255'],
            'gateway_transaction_id' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:payment,refund'],
            'status' => ['required', 'string', 'in:pending,success,failed,refunded'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['nullable', 'string', 'size:3'],
            'message' => ['nullable', 'string'],
            'processed_at' => ['nullable', 'date'],
            'request_payload' => ['nullable', 'array'],
            'response_payload' => ['nullable', 'array'],
        ];
    }
}
