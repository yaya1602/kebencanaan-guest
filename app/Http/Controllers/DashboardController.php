<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Fungsi index untuk menampilkan dashboard guest
     */
    public function index()
    {
        return view('dashboard-guest');
    }
}