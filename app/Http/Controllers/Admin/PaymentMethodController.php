<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePaymentMethodRequest;
use App\Http\Requests\Admin\UpdatePaymentMethodRequest;
use App\Http\Resources\Admin\AdminPaymentMethodResource;
use App\Models\PaymentMethod;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $query = PaymentMethod::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where(function ($q) use ($search, $likeOperator) {
                $q->where('name', $likeOperator, '%'.$search.'%')
                    ->orWhere('code', $likeOperator, '%'.$search.'%');
            });
        }

        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        $perPage = (int) $request->query('per_page', 50);

        $methods = $query
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate($perPage);

        return AdminPaymentMethodResource::collection($methods);
    }

    public function show(PaymentMethod $payment_method)
    {
        return new AdminPaymentMethodResource($payment_method);
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] ?? true;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $method = PaymentMethod::create($data);

        return (new AdminPaymentMethodResource($method))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        $data = $request->validated();
        $payment_method->fill($data)->save();

        return new AdminPaymentMethodResource($payment_method);
    }

    public function destroy(PaymentMethod $payment_method)
    {
        $payment_method->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $method = PaymentMethod::withTrashed()->findOrFail($id);
        $method->restore();

        return new AdminPaymentMethodResource($method);
    }

    public function toggleActive(PaymentMethod $payment_method)
    {
        $payment_method->is_active = ! $payment_method->is_active;
        $payment_method->save();

        return new AdminPaymentMethodResource($payment_method);
    }
}
