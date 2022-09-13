<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products', [
            'products' => Product::paginate(12)
        ]);
    }

    public function show($id){
        return view('detail-view',[
            'product' => Product::find($id)
        ]);
    }
}
