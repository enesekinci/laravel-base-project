<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $orders = Order::where('user_id', $user->id)
            ->with('items')
            ->orderByDesc('placed_at')
            ->paginate(20);

        return OrderResource::collection($orders);
    }

    public function show(Request $request, Order $order)
    {
        $user = $request->user();

        if ($order->user_id !== $user->id) {
            abort(403);
        }

        $order->load('items');

        return new OrderResource($order);
    }
}
