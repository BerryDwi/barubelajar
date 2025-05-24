<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login'); // kamu buat sendiri view ini
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'superadmin') {
                return redirect('/')->with('success', 'Login Berhasil');
            }
            if (auth()->user()->role == 'admin') {
                return redirect('/tabel-mahasiswa')->with('success', 'Login Berhasil');
            }
        }


        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
