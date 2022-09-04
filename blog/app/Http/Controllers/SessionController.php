<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->guest();

        return redirect('/')->with('success', 'GoodBye!');
    }
}
