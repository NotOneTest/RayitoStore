<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = $this->getCurrentCart();
        
        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío');
        }

        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $cart = $this->getCurrentCart();
        
        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío');
        }

        $request->validate([
            'shipping_address' => 'required|string|max:500',
        ]);

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'completed',
                'subtotal' => $cart->subtotal,
                'discount' => $cart->discount,
                'total' => $cart->total,
                'shipping_address' => $request->shipping_address,
                'payment_method' => 'simulated',
                'completed_at' => now(),
            ]);

            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'subtotal' => $item->subtotal,
                ]);
            }

            $cart->items()->delete();
            $cart->update(['status' => 'completed']);

            DB::commit();

            return redirect()->route('checkout.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Hubo un error al procesar tu pedido');
        }
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        return view('checkout.success', compact('order'));
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items.product')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('checkout.orders', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('home');
        }

        $order->load('items.product');
        return view('checkout.order-detail', compact('order'));
    }

    private function getCurrentCart(): Cart
    {
        return Auth::user()->activeCart() ?? new Cart();
    }
}
