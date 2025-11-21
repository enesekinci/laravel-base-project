<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CheckoutRequest;
use App\Http\Resources\Api\OrderResource;
use App\Models\Cart;
use App\Services\OrderPricingService;
use Illuminate\Http\Request;
use RuntimeException;

class CheckoutController extends Controller
{
    public function __construct(
        protected OrderPricingService $pricingService
    ) {}

    public function store(CheckoutRequest $request)
    {
        $user = $request->user();

        /** @var Cart|null $cart */
        $cart = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->first();

        if (!$cart) {
            return response()->json([
                'message' => 'Cart not found',
            ], 422);
        }

        try {
            $order = $this->pricingService->checkoutFromCart($cart, [
                'user_id'         => $user->id,
                'coupon_code'     => $request->input('coupon_code'),
                'billing_address' => $request->input('billing_address'),
                'shipping_address'=> $request->input('shipping_address'),
                'customer_email'  => $user->email,
                'customer_name'   => $user->name,
                'customer_phone'  => $request->input('customer_phone'),
                'payment_method'  => $request->input('payment_method', 'cod'),
                'currency'        => 'TRY',
                'shipping_total'  => $request->input('shipping_total', 0),
            ]);
        } catch (RuntimeException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 422);
        }

        $order->load('items');

        return (new OrderResource($order))
            ->response()
            ->setStatusCode(201);
    }
}
