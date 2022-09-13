<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // $user = new User();
        // $user->name = $request['name'];
        // $user->email = $request['email'];
        // $user->password = bcrypt($request['password']);

        // $user->save();

        // dd($request['phoneno']);

        // dd($request);

        // $attributes = User::create(['name' => $request['name'],  'email' => $request['email'], 'phoneno' => $request['phoneno'], 'address' => $request['address'], 'password' => bcrypt($request['password'])]);

        $attributes = User::create(['name' => $request['name'], 'email' => $request['email'], 'password' => bcrypt($request['password']),'address' => $request['address'], 'phoneno' => $request['phoneno'], ]);


        auth()->login($attributes);

        return redirect('/');
    }
}
