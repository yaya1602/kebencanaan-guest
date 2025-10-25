<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestKebencanaanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestKejadianBencana;
use App\Http\Controllers\GuestKejadianBencanaController;


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
    if (! session('success')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

// Arahkan halaman utama ke halaman login untuk kemudahan
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk dashboard guest
Route::get('/dashboard-guest', [DashboardController::class, 'index'])->name('dashboard-guest'); 

// Rute ini KHUSUS untuk menangani form EDIT yang ada gambarnya
Route::post('kejadian-bencana/update/{kejadianBencana}', [GuestKejadianBencanaController::class, 'update'])->name('kejadian-bencana.update-post');

// Route untuk CRUD Kejadian Bencana
Route::resource('kejadian-bencana', GuestKejadianBencanaController::class);


Route::get('/', function () {
    return view('welcome');
});