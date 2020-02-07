<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('login.create');
    }

    public function store(){
        if (!auth()->attempt(
            request(['email', 'password'])
        )) {
            return back()->withErrors([
                'message' => 'Nope. Please try again.'
            ]);
        }
        return redirect('/');
    }
    
    
    public function logout(){
        auth()->logout();//ovo su built in funkcije, 
        return redirect('/welcome');
    }

    public function welcome(){
        return view('welcome');
    }
}
