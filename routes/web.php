<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestKebencanaanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
return redirect('/kejadian');
});
// Halaman guest untuk melihat daftar kejadian
Route::get('/kejadian', [GuestKebencanaanController::class, 'index']);

// Route untuk menampilkan halaman login
Route::get('/auth', [AuthController::class, 'index'])->name('login');

// Route untuk memproses form login
Route::post('/auth/login', [AuthController::class, 'login']);

// Route untuk halaman sukses setelah login (halaman dashboard sementara)
Route::get('/dashboard', function () {
    // Pastikan hanya yang sudah login yang bisa akses (contoh sederhana)
    if (!session('success')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

// Arahkan halaman utama ke halaman login untuk kemudahan
Route::get('/', function () {
    return redirect()->route('login');
});
