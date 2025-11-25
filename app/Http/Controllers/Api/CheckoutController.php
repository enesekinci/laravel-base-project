<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Services\CartService;
use App\Services\Order\OrderStateService;
use App\Services\Payment\PaymentGatewayManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected PaymentGatewayManager $gatewayManager,
        protected OrderStateService $orderStateService,
    ) {}

    public function checkout(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'shipping_address_id' => ['required', 'exists:addresses,id'],
            'billing_address_id' => ['nullable', 'exists:addresses,id'],
            'shipping_method_id' => ['required', 'exists:shipping_methods,id'],
            'payment_method_id' => ['required', 'exists:payment_methods,id'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $shippingAddress = Address::where('user_id', $user->id)->findOrFail($data['shipping_address_id']);
        $billingAddress = isset($data['billing_address_id']) && $data['billing_address_id']
            ? Address::where('user_id', $user->id)->findOrFail($data['billing_address_id'])
            : $shippingAddress;

        $shippingMethod = ShippingMethod::findOrFail($data['shipping_method_id']);
        $paymentMethod = PaymentMethod::findOrFail($data['payment_method_id']);

        $cart = $this->cartService->getCartForUser($user);

        if ($cart->items->isEmpty()) {
            throw ValidationException::withMessages(['cart' => 'Cart is empty.']);
        }

        $order = DB::transaction(function () use (
            $user,
            $cart,
            $shippingAddress,
            $billingAddress,
            $shippingMethod,
            $paymentMethod,
            $data
        ) {
            // 1. Order oluştur
            $order = new Order;
            $order->user_id = $user->id;
            $order->shipping_address_id = $shippingAddress->id;
            $order->billing_address_id = $billingAddress->id;
            $order->shipping_method_id = $shippingMethod->id;
            $order->payment_method_id = $paymentMethod->id;
            $order->status = 'pending';
            $order->payment_status = 'pending';
            $order->shipping_status = 'pending';
            $order->notes = $data['notes'] ?? null;
            $order->currency = 'TRY'; // basit
            $order->subtotal = $cart->subtotal;
            $order->shipping_total = $shippingMethod->price ?? 0;
            $order->discount_total = $cart->discount_total ?? 0;
            $order->grand_total = $order->subtotal + $order->shipping_total - $order->discount_total;
            $order->save();

            // 2. OrderItems
            foreach ($cart->items as $item) {
                $product = $item->product;
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'product_variant_id' => $item->product_variant_id,
                    'name' => $product->name,
                    'sku' => $item->variant?->sku ?? $product->sku,
                    'unit_price' => $item->unit_price,
                    'quantity' => $item->quantity,
                    'total' => $item->total_price,
                ]);

                // stok düşme burada (product/variant stock service'inle yap)
            }

            // 3. Cart temizle
            $this->cartService->clearCart($cart);

            return $order;
        });

        // 4. Payment init
        $gateway = $this->gatewayManager->resolve($paymentMethod);
        $paymentInit = $gateway->createPayment($order);

        return response()->json([
            'order_id' => $order->id,
            'payment' => [
                'success' => $paymentInit->success,
                'redirectUrl' => $paymentInit->redirectUrl,
                'htmlForm' => $paymentInit->htmlForm,
                'message' => $paymentInit->message,
            ],
        ], 201);
    }
}
