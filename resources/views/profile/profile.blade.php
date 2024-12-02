@extends('layout.layout') <!-- Jika Anda menggunakan layout utama -->

@section('title', 'profile-belitiket.com')

@section('content')
    <div class="profile-container">
            <!-- Avatar Circle -->
            <div class="profile-avatar">
                <div class="avatar-circle-large">
                    <!-- Inisial nama pengguna, misalnya "A" -->
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            </div>

            <!-- User Information -->
            <div class="profile-info">
                <h2 class="profile-name">{{ $user->name }}</h2>
                <p class="profile-email">{{ $user->email }}</p>
            </div>
        </div>

        <!-- Tombol Ubah Akun -->
        <div class="profile-actions">
            <a href="{{ route('profile.account') }}" class="btn btn-primary">
                Ubah Akun
            </a>
        </div>
    </div>
@endsection
