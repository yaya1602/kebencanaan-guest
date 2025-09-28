<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestKebencanaanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
return redirect('/kejadian');
});
// Halaman guest untuk melihat daftar kejadian
Route::get('/kejadian', [GuestKebencanaanController::class, 'index']);
