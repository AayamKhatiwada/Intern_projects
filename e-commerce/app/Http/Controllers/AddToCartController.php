<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{
    public function index()
    {
        return view('add-to-cart');
    }

    public function store($id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart');

        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "price" => $product->price
        ];

        session()->put('cart', $cart);
        // dd(Session::get('cart'));

        return redirect('/cart');
    }

    public function destory($id){
        $cart = session()->get('cart');

        // session()->forget('cart')[$id];

        dd(session()->all());
        
        session()->forget($cart[$id]);
        return back();
    }
}
