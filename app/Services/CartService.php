<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function getOrCreateActiveCartForUser(User $user): Cart
    {
        return Cart::firstOrCreate(
            [
                'user_id' => $user->id,
                'status'  => 'active',
            ],
            [
                'currency' => 'TRY',
                'items_count' => 0,
                'subtotal'    => 0,
                'total'       => 0,
            ]
        );
    }

    public function addItem(Cart $cart, Product $product, ?ProductVariant $variant, int $quantity): CartItem
    {
        return DB::transaction(function () use ($cart, $product, $variant, $quantity) {
            $unitPrice = $this->resolveUnitPrice($product, $variant);

            // Aynı ürün+variant varsa qty arttır
            $item = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->when($variant, function ($q) use ($variant) {
                    $q->where('product_variant_id', $variant->id);
                }, function ($q) {
                    $q->whereNull('product_variant_id');
                })
                ->first();

            if ($item) {
                $item->quantity += $quantity;
                $item->unit_price = $unitPrice; // son fiyatı baz al
            } else {
                $item = new CartItem([
                    'product_id'        => $product->id,
                    'product_variant_id' => $variant?->id,
                    'quantity'          => $quantity,
                    'unit_price'        => $unitPrice,
                ]);
                $item->cart()->associate($cart);
            }

            $item->total_price = $item->quantity * $item->unit_price;
            $item->save();

            $this->recalculateCart($cart);

            return $item;
        });
    }

    public function updateItemQuantity(Cart $cart, CartItem $item, int $quantity): ?CartItem
    {
        return DB::transaction(function () use ($cart, $item, $quantity) {
            if ($quantity <= 0) {
                $item->delete();
                $this->recalculateCart($cart);
                return null;
            }

            $item->quantity = $quantity;
            $item->total_price = $item->quantity * $item->unit_price;
            $item->save();

            $this->recalculateCart($cart);

            return $item;
        });
    }

    public function removeItem(Cart $cart, CartItem $item): void
    {
        DB::transaction(function () use ($cart, $item) {
            $item->delete();
            $this->recalculateCart($cart);
        });
    }

    protected function resolveUnitPrice(Product $product, ?ProductVariant $variant): float
    {
        if ($variant) {
            return $variant->getEffectivePrice();
        }

        return $product->getEffectivePrice();
    }

    public function recalculateCart(Cart $cart): void
    {
        $cart->load('items');

        $subtotal = $cart->items->sum('total_price');
        $itemsCount = $cart->items->count();

        $cart->subtotal = $subtotal;
        $cart->total    = $subtotal; // ileride kargo/indirim ekleriz
        $cart->items_count = $itemsCount;

        $cart->save();
    }

    public function getCartForUser(User $user): Cart
    {
        return $this->getOrCreateActiveCartForUser($user);
    }

    public function clearCart(Cart $cart): void
    {
        DB::transaction(function () use ($cart) {
            $cart->items()->delete();
            $this->recalculateCart($cart);
        });
    }
}
