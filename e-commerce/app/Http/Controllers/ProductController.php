<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::latest();
        
        if(request('search')){
            $products->where('name','like','%' . request('search') . '%')
            ->orWhere('catagory','like','%'. request('search') . '%');
        }
        
        // dd($products->get());

        return view('products', [
            'products' => $products->get()
        ]);
    }

    public function show($slug){
        return view('detail-view',[
            'product' => Product::where('slug',$slug)->first()
        ]);
    }
}
