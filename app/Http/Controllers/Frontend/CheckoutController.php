<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('frontend.checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->id);
    }

    public function success(Order $order)
    {
        $order->load('orderItems.product');

        return view('frontend.checkout.success', compact('order'));
    }
}