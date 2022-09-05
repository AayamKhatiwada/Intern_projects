<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attribute = request()->validate([
            'name' => ['required','max:255'],
            'username' => ['required','max:255','min:3',Rule::unique('users','userName')], // 'required|min:3|max:255|unique:users,username
            'email' => ['required','email','max:255', Rule::unique('users','email')],
            'password' => ['required','min:7','max:255']
        ]);

        // hashing the passowrd
        $attribute['password'] = bcrypt($attribute['password']);

        $user = User::create($attribute);

        // logging in
        auth()->login($user);

        // we can also use session or we can use 'with' instead of flash
        // session()->flash('success','Your account has been created');

        return redirect('/')->with('success','Your account has been created');
    }
}
