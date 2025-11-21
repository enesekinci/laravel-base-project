<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'order_id'              => ['sometimes', 'nullable', 'exists:orders,id'],
            'payment_method_id'     => ['sometimes', 'nullable', 'exists:payment_methods,id'],
            'gateway'               => ['sometimes', 'nullable', 'string', 'max:255'],
            'gateway_transaction_id' => ['sometimes', 'nullable', 'string', 'max:255'],
            'type'                  => ['sometimes', 'required', 'string', 'in:payment,refund'],
            'status'                => ['sometimes', 'required', 'string', 'in:pending,success,failed,refunded'],
            'amount'                => ['sometimes', 'required', 'numeric', 'min:0'],
            'currency'              => ['sometimes', 'nullable', 'string', 'size:3'],
            'message'               => ['sometimes', 'nullable', 'string'],
            'processed_at'          => ['sometimes', 'nullable', 'date'],
            'request_payload'       => ['sometimes', 'nullable', 'array'],
            'response_payload'      => ['sometimes', 'nullable', 'array'],
        ];
    }
}
