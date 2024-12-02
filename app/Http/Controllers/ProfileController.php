<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Fungsi untuk menampilkan halaman profil
    // Menampilkan halaman profil user
    public function profile()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Mengirimkan data pengguna ke view
        return view('profile.profile', compact('user'));
    }

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        return view('profile.profile', compact('user')); // Halaman profil pengguna
    }

    // Fungsi untuk menampilkan halaman pengaturan akun
    public function account()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        return view('profile.account', compact('user')); // Halaman pengaturan akun
    }

    // Fungsi untuk mengupdate data akun
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.account')->with('status', 'Akun berhasil diperbarui.');
    }
}
