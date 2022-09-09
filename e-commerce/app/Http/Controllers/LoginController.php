<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (auth()->attempt($attributes)){
            return redirect('/');
        }

        return redirect('/');

    }

    public function destroy(){
        auth()->logout();

        return redirect('/');
    }
}
