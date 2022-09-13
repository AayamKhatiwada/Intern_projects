<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('delivery-form');
    }

    public function store(Request $request){
        // dd($request);
        $cart = session()->get('cart');

        // dd($cart);

        foreach ($cart as $cart) {
            Order::create([
                'product_id'=> $cart['id'],
                'username'=> $request->name,
                'phoneno' => $request->phoneno,
                'address' => $request->address,
                'quantity' => 1,
            ]);
        }

        session()->forget('cart');

        return redirect('/');
    }
}
