<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('dashboard-guest');
    }
}
