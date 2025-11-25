<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class OrderPricingService
{
    public function checkoutFromCart(Cart $cart, array $payload): Order
    {
        if ($cart->items()->count() === 0) {
            throw new RuntimeException('Cart is empty');
        }

        return DB::transaction(function () use ($cart, $payload) {
            $coupon = null;
            $couponCode = $payload['coupon_code'] ?? null;
            $subtotal = 0;
            $taxTotal = 0;
            $itemsData = [];

            // 1. Cart item'ları snapshot'a çevir
            foreach ($cart->items as $item) {
                /** @var Product $product */
                $product = $item->product;
                /** @var ProductVariant|null $variant */
                $variant = $item->variant;

                $unitPrice = $variant && $variant->price !== null
                    ? (float) $variant->price
                    : (float) $product->price;

                $qty = $item->quantity;

                // çok basic tax: product->taxClass->rate kullandığını varsayıyorum
                $taxClass = $product->taxClass ?? null;
                $taxRate = $taxClass ? (float) $taxClass->rate : 0;

                $lineSubtotal = $unitPrice * $qty;
                $lineTax = $taxRate > 0 ? $lineSubtotal * $taxRate / 100 : 0;
                $lineTotal = $lineSubtotal + $lineTax;

                $subtotal += $lineSubtotal;
                $taxTotal += $lineTax;

                $itemsData[] = [
                    'product_id' => $product->id,
                    'product_variant_id' => $variant?->id,
                    'name' => $product->name,
                    'sku' => $variant?->sku ?? $product->sku,
                    'unit_price' => $unitPrice,
                    'quantity' => $qty,
                    'tax_class_id' => $taxClass?->id,
                    'tax_rate' => $taxRate,
                    'subtotal' => $lineSubtotal,
                    'discount_total' => 0,
                    'tax_total' => $lineTax,
                    'total' => $lineTotal,
                ];
            }

            // 2. Kupon uygula
            $discountTotal = 0;
            $couponDiscount = 0;
            if ($couponCode) {
                $coupon = $this->validateAndGetCoupon($couponCode, $subtotal, $payload['user_id'] ?? null);
                if ($coupon) {
                    if ($coupon->type === 'percent') {
                        $couponDiscount = round($subtotal * ($coupon->value / 100), 2);
                    } elseif ($coupon->type === 'fixed') {
                        $couponDiscount = min($subtotal, $coupon->value);
                    }
                    $discountTotal += $couponDiscount;
                }
            }

            // 3. Shipping (şimdilik basit: sabit 0 veya payload'tan)
            $shippingTotal = (float) ($payload['shipping_total'] ?? 0);

            // 4. Grand total
            $grandTotal = $subtotal - $discountTotal + $taxTotal + $shippingTotal;
            if ($grandTotal < 0) {
                $grandTotal = 0;
            }

            // 5. Order oluştur
            $order = new Order;
            $order->user_id = $payload['user_id'] ?? null;
            $order->status = 'pending';
            $order->payment_status = 'pending';
            $order->payment_method = $payload['payment_method'] ?? null;
            $order->currency = $payload['currency'] ?? 'TRY';
            $order->subtotal = $subtotal;
            $order->discount_total = $discountTotal;
            $order->tax_total = $taxTotal;
            $order->shipping_total = $shippingTotal;
            $order->grand_total = $grandTotal;
            $order->coupon_code = $coupon?->code;
            $order->coupon_discount = $couponDiscount;
            $order->billing_address = $payload['billing_address'] ?? null;
            $order->shipping_address = $payload['shipping_address'] ?? null;
            $order->customer_email = $payload['customer_email'] ?? null;
            $order->customer_name = $payload['customer_name'] ?? null;
            $order->customer_phone = $payload['customer_phone'] ?? null;
            $order->placed_at = Carbon::now();
            $order->save();

            // 6. OrderItem'ları yaz
            foreach ($itemsData as $itemData) {
                $itemData['order_id'] = $order->id;
                OrderItem::create($itemData);
            }

            // 7. Kupon kullanım sayacı
            if ($coupon) {
                $coupon->increment('used_count');
            }

            // 8. Stok düşme / cart temizleme (örnek basic)
            foreach ($cart->items as $item) {
                $product = $item->product;
                $variant = $item->variant;

                if ($variant) {
                    $variant->quantity = max(0, $variant->quantity - $item->quantity);
                    $variant->save();
                } elseif ($product->manage_stock) {
                    $product->quantity = max(0, $product->quantity - $item->quantity);
                    $product->in_stock = $product->quantity > 0;
                    $product->save();
                }
            }

            $cart->items()->delete();
            $cart->delete(); // istersen sadece items'ı temizlersin

            return $order;
        });
    }

    protected function validateAndGetCoupon(string $code, float $cartSubtotal, ?int $userId = null): ?Coupon
    {
        $coupon = Coupon::where('code', $code)
            ->where('is_active', true)
            ->first();

        if (! $coupon) {
            throw new RuntimeException('Invalid coupon code');
        }

        $now = Carbon::now();

        if ($coupon->starts_at && $coupon->starts_at->isAfter($now)) {
            throw new RuntimeException('Coupon not active yet');
        }

        if ($coupon->ends_at && $coupon->ends_at->isBefore($now)) {
            throw new RuntimeException('Coupon expired');
        }

        if ($coupon->usage_limit !== null && $coupon->used_count >= $coupon->usage_limit) {
            throw new RuntimeException('Coupon usage limit reached');
        }

        if ($cartSubtotal < $coupon->min_cart_total) {
            throw new RuntimeException('Cart total is below coupon minimum');
        }

        // user bazlı limit istiyorsan burada coupon_usages tablosu ile kontrol edersin
        return $coupon;
    }
}
