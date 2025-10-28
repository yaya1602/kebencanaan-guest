<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestKebencanaanController;
use App\Http\Controllers\GuestKejadianBencanaController;

// Arahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD tamu setelah login
Route::get('/dashboard-guest', [DashboardController::class, 'index'])->name('dashboard-guest');

// HALAMAN TAMU
Route::get('/kejadian', [GuestKebencanaanController::class, 'index']);

// CRUD Kejadian Bencana
Route::post('kejadian-bencana/update/{kejadianBencana}', [GuestKejadianBencanaController::class, 'update'])
    ->name('kejadian-bencana.update-post');
Route::resource('kejadian-bencana', GuestKejadianBencanaController::class);

// CRUD Warga & User
Route::resource('warga', WargaController::class);
Route::resource('user', UserController::class);
