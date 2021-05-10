<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Login;
use Illuminate\Http\Request;

class AuthController extends Controller
{


    public function index()
    {
        return view('login.login');
    }


    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }

        return redirect('/');
    }







    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }



}
