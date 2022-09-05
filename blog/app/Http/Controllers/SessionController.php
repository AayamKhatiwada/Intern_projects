<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->guest();

        return redirect('/')->with('success', 'GoodBye!');
    }

    public function store()
    {
        // validate the request
        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        // attempt to authenticate and log in the user
        // based on the provided credentials

        if (!auth()->attempt($attribute)) {
            // auth failed
            // first way
            ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
        
        // deals with session fixtation
        session()->regenerate();
        // redirect with a sucess flash message
        return redirect('/')->with('success', 'Welcome Back!');

        // second way
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
