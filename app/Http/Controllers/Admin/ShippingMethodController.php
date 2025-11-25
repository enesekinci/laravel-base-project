<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreShippingMethodRequest;
use App\Http\Requests\Admin\UpdateShippingMethodRequest;
use App\Http\Resources\Admin\AdminShippingMethodResource;
use App\Models\ShippingMethod;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index(Request $request)
    {
        $query = ShippingMethod::query();

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

        return AdminShippingMethodResource::collection($methods);
    }

    public function show(ShippingMethod $shipping_method)
    {
        return new AdminShippingMethodResource($shipping_method);
    }

    public function store(StoreShippingMethodRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] ?? true;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $method = ShippingMethod::create($data);

        return (new AdminShippingMethodResource($method))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateShippingMethodRequest $request, ShippingMethod $shipping_method)
    {
        $data = $request->validated();
        $shipping_method->fill($data)->save();

        return new AdminShippingMethodResource($shipping_method);
    }

    public function destroy(ShippingMethod $shipping_method)
    {
        $shipping_method->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        $method = ShippingMethod::withTrashed()->findOrFail($id);
        $method->restore();

        return new AdminShippingMethodResource($method);
    }

    public function toggleActive(ShippingMethod $shipping_method)
    {
        $shipping_method->is_active = ! $shipping_method->is_active;
        $shipping_method->save();

        return new AdminShippingMethodResource($shipping_method);
    }
}
