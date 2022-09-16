<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('delivery-form');
    }

    public function store(Request $request)
    {

        $cart = session()->get('cart');

        $order = Order::create([
            'user_id' => $request->id,
            'name' => $request->name,
            'phoneno' => $request->phoneno,
            'email' => $request->email,
            'address' => $request->address,
            'total' => session()->get('total'),
        ]);

        foreach ($cart as $cart) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cart['id'],
                'quantity' => $cart['quantity'],
                'price'=> $cart['price'],
            ]);
        }
        // dd($request);

        session()->forget('cart');
        session()->forget('total');

        return redirect('/');
    }
}
