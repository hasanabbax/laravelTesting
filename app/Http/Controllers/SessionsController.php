<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest')->except('destroy');
        $this->middleware('guest',['except' => 'destroy']);
    }

    //
    public function create()
    {
        return view('sessions/create');
    }

    public function store()
    {
        //attempt to authenticate user

        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'check credentials and try again'
            ]); //redirect back
        };

        //if not, redirect back

        //if so, sign them in

        //redirect to home page

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
