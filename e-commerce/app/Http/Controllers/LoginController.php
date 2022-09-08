<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        
        auth()->attempt($attributes);
    }
}
