<?php

use App\Http\Controllers\dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\KejadianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestKebencanaanController;
use App\Http\Controllers\GuestKejadianBencanaController;
use App\Http\Controllers\KejadianBencanaController;

// Arahkan ke login
Route::get('/', function () {
    return redirect()->route('dashboard-guest');
});

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// DASHBOARD tamu setelah login (arahkan ke halaman sekolah)
Route::get('/dashboard-guest', [SekolahController::class, 'index'])->name('dashboard-guest');

// HALAMAN TAMU
Route::get('/kejadian', [GuestKebencanaanController::class, 'index']);

// CRUD Warga & User
Route::resource('warga', WargaController::class);
Route::resource('user', UserController::class);

//baru ke halaman dashboard sekolah
Route::resource('sekolah', SekolahController::class);

//route untuk kejadian bencana
Route::resource('kejadian', KejadianController::class);

// HALAMAN TENTANG KAMI
Route::resource('about', AboutController::class)->only(['index']);
