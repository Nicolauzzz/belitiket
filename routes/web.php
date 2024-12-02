<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventdetailController;
use App\Http\Controllers\BuyTicketsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CheckoutController;

// Route ke halaman utama
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Route ke halaman profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.profile')->middleware('auth'); //aksesk halaman profil

// Route dari event dashboard untuk menampilkan detail event menggunakan id pada database
Route::get('/event/{id}', [EventdetailController::class, 'show'])->name('event.show');

// Route dari event detail ke halaman pilih tiket (BuyTicketsController)
Route::get('/buy-ticket/{event_id}', [BuyTicketsController::class, 'index'])->name('buy-ticket');

// Routing ke halaman History lewat lingkaran profile
Route::get('/history', [HistoryController::class, 'index'])->name('profile.history');

// Halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login');             // Route GET untuk menampilkan form login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');        // Route POST untuk memproses login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman pendaftaran akun
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Halaman untuk mengubah akun
Route::get('/account', [ProfileController::class, 'account'])->name('profile.account')->middleware('auth');
Route::put('/account', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//untuk halaman checkout dan payment (masih belum bisa narik total tiket dan harga, cek javascript)
Route::get('/checkout/{event_id}', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/{event_id}/process', [CheckoutController::class, 'processCheckout'])->name('process-checkout');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/process-payment', [CheckoutController::class, 'processPayment'])->name('process-payment');
