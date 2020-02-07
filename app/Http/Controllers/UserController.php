<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id){
        $user = User::with('posts')->find($id);//with je absolutno kljucna rec, ovako ce vratiti i postove datog usera
        \Log::info($user);
        return view('users.show', compact(['user']));
    }
}
