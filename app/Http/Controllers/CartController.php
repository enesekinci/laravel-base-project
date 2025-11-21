<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', ['items' => [], 'total' => 0]);
        return response()->json($cart);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'options' => 'nullable|array',
        ]);

        $product = Product::with('media')->find($request->product_id);
        $cart = Session::get('cart', ['items' => [], 'total' => 0]);

        $cartItemKey = $product->id . '-' . json_encode($request->options);

        if (isset($cart['items'][$cartItemKey])) {
            $cart['items'][$cartItemKey]['quantity'] += $request->quantity;
        } else {
            $cart['items'][$cartItemKey] = [
                'key' => $cartItemKey,
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price, // Assuming simple price for now, handle variations later
                'quantity' => $request->quantity,
                'image' => $product->media->first()?->path ?? '/porto/assets/images/products/product-1.jpg',
                'options' => $request->options,
                'url' => route('page', ['page' => 'product', 'product' => $product->slug]),
            ];
        }

        $this->recalculateCart($cart);
        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart' => $cart
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_key' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Session::get('cart', ['items' => [], 'total' => 0]);

        if (isset($cart['items'][$request->item_key])) {
            $cart['items'][$request->item_key]['quantity'] = $request->quantity;
            $this->recalculateCart($cart);
            Session::put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'item_key' => 'required',
        ]);

        $cart = Session::get('cart', ['items' => [], 'total' => 0]);

        if (isset($cart['items'][$request->item_key])) {
            unset($cart['items'][$request->item_key]);
            $this->recalculateCart($cart);
            Session::put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }

    private function recalculateCart(&$cart)
    {
        $total = 0;
        foreach ($cart['items'] as &$item) {
            $item['subtotal'] = $item['price'] * $item['quantity'];
            $item['formatted_unit_price'] = '$' . number_format($item['price'], 2);
            $item['formatted_subtotal'] = '$' . number_format($item['subtotal'], 2);
            $total += $item['subtotal'];
        }
        $cart['total'] = $total;
        $cart['formatted_total'] = '$' . number_format($total, 2);
        $cart['item_count'] = count($cart['items']);
    }
}
