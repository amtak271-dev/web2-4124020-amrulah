<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // tampil halaman login
    public function index()
    {
        return view('login');
    }

    // proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            // cek role
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/santri');
            }

        }

        return back()->with('error', 'Email atau Password salah');
    }

    // logout
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}