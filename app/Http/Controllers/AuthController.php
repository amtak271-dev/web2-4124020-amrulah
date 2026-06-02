<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // tampil halaman login
    public function showLogin()
    {
        return view('login');
    }

    // proses login
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => strtolower($request->role)
        ];

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'admin') {

                return redirect('/admin');

            } elseif (Auth::user()->role == 'santri') {

                return redirect('/dashboard-santri');

            }

        }

        return back()->with('error', 'Email, Password atau Role salah');
    }

    // logout
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}