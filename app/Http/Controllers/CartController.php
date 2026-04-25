<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getCurrentCart();
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1|max:10',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = $this->getCurrentCart();
        $quantity = $request->quantity ?? 1;

        $existingItem = $cart->items()->where('product_id', $product->id)->first();

        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $quantity;
            if ($newQuantity > 10) {
                $newQuantity = 10;
            }
            $existingItem->updateQuantity($newQuantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->final_price,
                'subtotal' => $product->final_price * $quantity,
            ]);
        }

        $cart->calculateTotals();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Producto agregado al carrito',
                'cart_count' => $cart->items_count,
            ]);
        }

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $item->updateQuantity($request->quantity);
        $item->cart->calculateTotals();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'item_subtotal' => $item->subtotal,
                'cart_subtotal' => $item->cart->subtotal,
                'cart_discount' => $item->cart->discount,
                'cart_total' => $item->cart->total,
            ]);
        }

        return redirect()->back();
    }

    public function remove(Request $request, CartItem $item)
    {
        $cart = $item->cart;
        $item->delete();
        $cart->calculateTotals();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado',
                'cart_subtotal' => $cart->subtotal,
                'cart_discount' => $cart->discount,
                'cart_total' => $cart->total,
                'cart_count' => $cart->items_count,
            ]);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function clear()
    {
        $cart = $this->getCurrentCart();
        $cart->items()->delete();
        $cart->calculateTotals();

        return redirect()->back()->with('success', 'Carrito vaciado');
    }

    private function getCurrentCart(): Cart
    {
        if (Auth::check()) {
            $cart = Auth::user()->activeCart();
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => Auth::id(),
                    'status' => 'active',
                ]);
            }
            return $cart;
        }

        $sessionId = session()->getId();
        $cart = Cart::where('user_id', 1)->active()->first();
        
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => 1,
                'status' => 'active',
            ]);
        }

        return $cart;
    }
}
