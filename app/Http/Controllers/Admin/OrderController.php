<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminOrderResource;
use App\Models\Order;
use App\Support\DatabaseHelper;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        /* $query = Order::query()->with('items');

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        if ($paymentStatus = $request->query('payment_status')) {
            $query->where('payment_status', $paymentStatus);
        }

        if ($couponCode = $request->query('coupon_code')) {
            $query->where('coupon_code', $couponCode);
        } */

        $status = $request->query('status');
        $paymentStatus = $request->query('payment_status');
        $couponCode = $request->query('coupon_code');
        $search = $request->query('search');
        $perPage = (int) $request->query('per_page', 20);

        $query = Order::query()->with('items')
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($paymentStatus, function ($query, $paymentStatus) {
                $query->where('payment_status', $paymentStatus);
            })
            ->when($couponCode, function ($query, $couponCode) {
                $query->where('coupon_code', $couponCode);
            })
            ->when($search, function ($query, $search) {
                $likeOperator = DatabaseHelper::getCaseInsensitiveLikeOperator();
                $query->where(function ($q) use ($search, $likeOperator) {
                    $q->where('id', $search)
                        ->orWhere('customer_email', $likeOperator, "%$search%")
                        ->orWhere('customer_name', $likeOperator, "%$search%");
                });
            })
            ->orderByDesc('placed_at')
            ->paginate($perPage);

        return AdminOrderResource::collection($query);
    }

    public function show(Order $order)
    {
        $order->load('items');

        return new AdminOrderResource($order);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', 'string', 'in:pending,paid,cancelled,shipped,completed,refunded'],
            'payment_status' => ['nullable', 'string', 'in:pending,paid,failed,refunded'],
        ]);

        $order->status = $data['status'];
        if (array_key_exists('payment_status', $data)) {
            $order->payment_status = $data['payment_status'];
        }
        $order->save();

        $order->load('items');

        return new AdminOrderResource($order);
    }
}
