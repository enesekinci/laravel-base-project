<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\StoreCartItemRequest;
use App\Http\Requests\Api\Cart\UpdateCartItemRequest;
use App\Http\Resources\CartItemResource;
use App\Http\Resources\CartResource;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    public function show(Request $request)
    {
        $user = $request->user();

        $cart = $this->cartService->getOrCreateActiveCartForUser($user);

        $cart->load('items.product');

        // Cart her zaman 200 döner (oluşturuldu veya mevcut)
        return (new CartResource($cart))->response()->setStatusCode(200);
    }

    public function storeItem(StoreCartItemRequest $request)
    {
        $user = $request->user();

        $cart = $this->cartService->getOrCreateActiveCartForUser($user);

        $product = Product::findOrFail($request->input('product_id'));

        $variant = null;
        if ($variantId = $request->input('product_variant_id')) {
            $variant = ProductVariant::where('product_id', $product->id)
                ->where('id', $variantId)
                ->firstOrFail();
        }

        $item = $this->cartService->addItem(
            $cart,
            $product,
            $variant,
            (int) $request->input('quantity')
        );

        $item->load('product');

        return (new CartItemResource($item))
            ->response()
            ->setStatusCode(201);
    }

    public function updateItem(UpdateCartItemRequest $request, CartItem $cartItem)
    {
        $user = $request->user();
        $cart = $this->cartService->getOrCreateActiveCartForUser($user);

        if ($cartItem->cart_id !== $cart->id) {
            abort(403);
        }

        $quantity = (int) $request->input('quantity');

        $updated = $this->cartService->updateItemQuantity($cart, $cartItem, $quantity);

        if (! $updated) {
            return response()->json([
                'data' => null,
            ], 200);
        }

        $updated->load('product');

        return new CartItemResource($updated);
    }

    public function destroyItem(Request $request, CartItem $cartItem)
    {
        $user = $request->user();
        $cart = $this->cartService->getOrCreateActiveCartForUser($user);

        if ($cartItem->cart_id !== $cart->id) {
            abort(403);
        }

        $this->cartService->removeItem($cart, $cartItem);

        return response()->json(null, 204);
    }
}
