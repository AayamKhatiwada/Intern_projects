<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{
    public function index()
    {
        // session()->forget('cart');
        return view('add-to-cart');
    }

    public function store(Request $request,$id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart');
        $request->quantity = (int)$request->quantity;

        // dd(isset($cart[$id]));

        if(isset($cart[$id])){  
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "catagory"=> $product->catagory,
                "price" => $product->price,
                "quantity" => $request->quantity + $cart[$id]['quantity'],
            ];
            session()->put('cart', $cart);
            return redirect('/cart');
        }

        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "catagory"=> $product->catagory,
            "quantity" => $request->quantity,
            "price" => $product->price
        ];

        session()->put('cart', $cart);

        // dd(session()->all());
        
        // session()->forget('cart');
        // dd(Session::get('cart'));

        return redirect('/cart');
    }

    public function update(Request $request,$id){
        dd($request);
    }

    public function destory($id){
        $cart = session()->get('cart');

        // dd(session()->all());
        // dd(session()->forget('cart'));

        unset($cart[$id]);

        session()->forget('cart');

        session()->put('cart', $cart);

        return back();
    }

    public function delete(){

        session()->forget('cart');

        return back();
    }
}
