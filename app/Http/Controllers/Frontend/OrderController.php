<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Show checkout page
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if(count($cart) == 0){
            return redirect()->route('cart.index')->with('error','Cart is empty');
        }

        return view('frontend.checkout', compact('cart'));
    }


    // Store order
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'note' => 'nullable'
        ]);

        $cart = session()->get('cart', []);

        if(count($cart) == 0){
            return redirect()->back();
        }

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['qty'];
        }

        // Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        // Save order items
        foreach($cart as $item){

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'qty' => $item['qty']
            ]);

        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('home')->with('success','Order placed successfully');
    }
}