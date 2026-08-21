<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        if (Auth::check()) {
            return Auth::user()->isAdmin() ? redirect('/admin') : redirect('/simulator');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/simulator');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah. Silakan coba lagi.',
        ])->withInput($request->only('email'));
    }
}
