<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KejadianBencana;
use App\Http\Controllers\GuestKejadianBencana;

class GuestKejadianBencana extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Mengambil semua data dari tabel kejadian_bencana
        $data['kejadian'] = KejadianBencana::all();
        return view('guest.kejadian.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest.kejadian.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_bencana' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data ke database
        KejadianBencana::create($request->all());

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('guest.kejadian.index')->with('success', 'Data kejadian bencana berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kejadian = KejadianBencana::findOrFail($id);
        return view('guest.kejadian.edit', compact('kejadian'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi input
        $request->validate([
            'nama_bencana' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data
        $kejadian = KejadianBencana::findOrFail($id);
        $kejadian->update($request->all());

        return redirect()->route('guest.kejadian.index')->with('success', 'Data kejadian bencana berhasil diperbarui!');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $kejadian = KejadianBencana::findOrFail($id);
        $kejadian->delete();

        return redirect()->route('guest.kejadian.index')->with('success', 'Data kejadian bencana berhasil dihapus!');

    }
}
