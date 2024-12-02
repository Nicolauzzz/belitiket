@extends('layout.layout')

@section('title', 'Create Account - belitiket.com')

@section('content')
    <div class="login-container">
        <div class="login-card">
            <h2>Buat Akun</h2>

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div>
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>

                <div>
                    <button type="submit">Daftar</button>
                </div>
            </form>

            <div class="login-link">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
            </div>
        </div>
    </div>
@endsection
