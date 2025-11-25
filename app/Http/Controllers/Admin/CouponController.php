<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCouponRequest;
use App\Http\Requests\Admin\UpdateCouponRequest;
use App\Http\Resources\Admin\AdminCouponResource;
use App\Models\Coupon;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $query = Coupon::query();

        if ($search = $request->query('search')) {
            $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
            $query->where('code', $likeOperator, '%'.$search.'%');
        }

        if ($type = $request->query('type')) {
            $query->where('type', $type);
        }

        if (! is_null($request->query('is_active'))) {
            $val = (int) $request->query('is_active') === 1;
            $query->where('is_active', $val);
        }

        if ($request->boolean('only_active')) {
            $now = now();
            $query
                ->where('is_active', true)
                ->where(function ($q) use ($now) {
                    $q->whereNull('starts_at')
                        ->orWhere('starts_at', '<=', $now);
                })
                ->where(function ($q) use ($now) {
                    $q->whereNull('ends_at')
                        ->orWhere('ends_at', '>=', $now);
                });
        }

        $perPage = (int) $request->query('per_page', 50);

        $coupons = $query
            ->orderByDesc('id')
            ->paginate($perPage);

        return AdminCouponResource::collection($coupons);
    }

    public function show(Coupon $coupon)
    {
        return new AdminCouponResource($coupon);
    }

    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();

        if (! array_key_exists('is_active', $data)) {
            $data['is_active'] = true;
        }

        $coupon = Coupon::create($data);

        return (new AdminCouponResource($coupon))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $data = $request->validated();

        $coupon->fill($data);
        $coupon->save();

        return new AdminCouponResource($coupon);
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete(); // soft delete

        return response()->noContent();
    }

    public function restore($id)
    {
        $coupon = Coupon::withTrashed()->findOrFail($id);
        $coupon->restore();

        return new AdminCouponResource($coupon);
    }

    public function toggleActive(Coupon $coupon)
    {
        $coupon->is_active = ! $coupon->is_active;
        $coupon->save();

        return new AdminCouponResource($coupon);
    }
}
