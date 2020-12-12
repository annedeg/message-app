<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back();
    }

    function logout(Request $request) {
        $request->session()->invalidate();
        return redirect()->to('/login');
    }
}
