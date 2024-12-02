<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard-belitiket')</title>
    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
</head>
<body>

<!-- Header Section -->
<header class="header">
    <div class="logo">
        <a href="/dashboard"  class="logo-text"><em>belitiket.com</em></a>
    </div>
    <nav class="nav-menu">
        <!-- Menu atau navigasi lain bisa ditambahkan di sini -->
    </nav>
    @if (!request()->is('login'))
    <div class="avatar">
        <div class="avatar-circle">L</div>
        <div class="dropdown">
            <a href="{{ route('profile.profile') }}">Profile</a>
            <a href="{{ route('profile.history') }}">History</a>
            <a href="{{ route('login') }}">Logout</a>
        </div>
    </div>
    @endif
</header>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer Section -->
<footer>
    <div class="footer-left">
        <p><em>belitiket.com</em></p>
    </div>
    </div>
    <div class="footer-content">
        <p class="copyright">&copy; Copyright Kelompok 6 PBO 2024. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
