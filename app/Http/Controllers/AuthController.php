<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil user berdasarkan username
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_id' => $user->id,
                'user_nama' => $user->username,
            ]);
            return redirect()->route('sekolah.index')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['loginError' => 'Username atau password salah!'])->withInput();
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}