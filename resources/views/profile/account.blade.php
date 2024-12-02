@extends('layout.layout')

@section('title', 'Change Account Details - belitiket.com')

@section('content')
    <div class="account-container">
        <div class="account-card">
            <h2>Ubah Detail Akun</h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div>
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password">
                </div>

                <div>
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div>
                    <button type="submit">Perbarui Akun</button>
                </div>
            </form>
        </div>
    </div>
@endsection
