<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::latest()->paginate(9); // Ambil data terbaru, 9 per halaman
        return view('warga.index', compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga.create'); // Arahkan ke file create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:wargas,nik', // NIK harus unik di tabel wargas
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // Harus salah satu dari 2 nilai ini
        ]);

        // 2. Simpan Data
        Warga::create($request->all());

        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        return view('warga.show', compact('warga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga')); // Arahkan ke file edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warga $warga)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => [
                'required', 'string', 'size:16',
                Rule::unique('wargas')->ignore($warga->id), // NIK harus unik, KECUALI untuk ID warga ini
            ],
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // 2. Update Data
        $warga->update($request->all());

        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        // Hapus data
        $warga->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil dihapus.');
    }
}
