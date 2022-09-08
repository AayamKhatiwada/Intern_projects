<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products', [
            'products' => Product::paginate(21)
        ]);
    }

    public function show(){
        
    }
}
