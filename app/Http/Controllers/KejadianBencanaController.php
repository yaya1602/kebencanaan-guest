<?php

namespace App\Http\Controllers;

use App\Models\KejadianBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KejadianBencanaController extends Controller
{
    /**
     * Tampilkan semua data kejadian bencana (READ)
     */
    public function index()
    {
        $kejadianBencana = KejadianBencana::latest()->paginate(10);
    return view('pages.kejadian.index', compact('kejadianBencana'));
    }

    /**
     * Tampilkan form untuk tambah data (CREATE form)
     */
    public function create()
    {
        return view('pages.kejadian.create');
    }

    /**
     * Simpan data baru ke database (CREATE store)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bencana' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('kejadian_bencana', 'public');
            $data['gambar'] = $path;
        }

        KejadianBencana::create($data);

        return redirect()->route('kejadian_bencana.index')
            ->with('success', 'Data kejadian bencana berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data tertentu (READ detail)
     */
    public function show(KejadianBencana $kejadian_bencana)
    {
        return view('pages.kejadian.show', compact('kejadian_bencana'));
    }

    /**
     * Tampilkan form edit data (UPDATE form)
     */
    public function edit(KejadianBencana $kejadian_bencana)
    {
        return view('pages.kejadian.edit', compact('kejadian_bencana'));
    }

    /**
     * Simpan perubahan data (UPDATE)
     */
    public function update(Request $request, KejadianBencana $kejadian_bencana)
    {
        $request->validate([
            'nama_bencana' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = $request->only(['nama_bencana', 'tanggal', 'lokasi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($kejadian_bencana->gambar) {
                Storage::delete('public/' . $kejadian_bencana->gambar);
            }

            $path = $request->file('gambar')->store('kejadian_bencana', 'public');
            $data['gambar'] = $path;
        }

        $kejadian_bencana->update($data);

        return redirect()->route('kejadian_bencana.index')
            ->with('success', 'Data kejadian bencana berhasil diperbarui.');
    }

    /**
     * Hapus data (DELETE)
     */
    public function destroy(KejadianBencana $kejadian_bencana)
    {
        if ($kejadian_bencana->gambar) {
            Storage::delete('public/' . $kejadian_bencana->gambar);
        }

        $kejadian_bencana->delete();

        return redirect()->route('kejadian_bencana.index')
            ->with('success', 'Data kejadian bencana berhasil dihapus.');
    }
}
