<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // Menampilkan halaman login
        return view('profile.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Mencoba untuk login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika login berhasil, redirect ke dashboard
            return redirect()->route('dashboard.index');
        }

        // Jika gagal login, kembali ke halaman login dengan error
        return redirect()->route('login')->withErrors(['login' => 'Email atau password salah.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
