<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTransactionRequest;
use App\Http\Requests\Admin\UpdateTransactionRequest;
use App\Http\Resources\Admin\AdminTransactionResource;
use App\Models\Transaction;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::query()
            ->with(['order', 'paymentMethod']);

        if ($orderId = $request->query('order_id')) {
            $query->where('order_id', $orderId);
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }

        if ($gateway = $request->query('gateway')) {
            $query->where('gateway', $gateway);
        }

        if ($paymentMethodId = $request->query('payment_method_id')) {
            $query->where('payment_method_id', $paymentMethodId);
        }

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('gateway_transaction_id', $likeOperator, '%'.$search.'%')
                    ->orWhere('id', $search);
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->query('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->query('date_to'));
        }

        $perPage = (int) $request->query('per_page', 50);

        $transactions = $query
            ->orderByDesc('created_at')
            ->paginate($perPage);

        return AdminTransactionResource::collection($transactions);
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['order', 'paymentMethod']);

        return new AdminTransactionResource($transaction);
    }

    public function store(StoreTransactionRequest $request)
    {
        $data = $request->validated();

        if (! isset($data['currency'])) {
            $data['currency'] = 'TRY';
        }

        $transaction = Transaction::create($data);

        $transaction->load(['order', 'paymentMethod']);

        return (new AdminTransactionResource($transaction))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->fill($request->validated());
        $transaction->save();

        $transaction->load(['order', 'paymentMethod']);

        return new AdminTransactionResource($transaction);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->noContent();
    }
}
