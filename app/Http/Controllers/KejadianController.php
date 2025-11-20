<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KejadianBencana;
use Illuminate\Support\Facades\Storage;

class KejadianController extends Controller
{
    /**
     * Tampilkan semua data kejadian bencana (READ)
     */
    public function index()
    {
        $data ['dataKejadian'] = KejadianBencana::paginate(10);
        return view('pages.kejadian.index', $data);


        $data ['dataPosko']= PoskoBencana::paginate(10);
        return view('pages.posko.index', $data);
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
            'tanggal'      => 'required|date',
            'lokasi'       => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $path           = $request->file('gambar')->store('kejadian_bencana', 'public');
            $data['gambar'] = $path;
        }

        KejadianBencana::create($data);

        return redirect()->route('kejadian.index')
            ->with('success', 'Data kejadian bencana berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail data tertentu (READ detail)
     */
    public function show(KejadianBencana $kejadian)
    {
        return view('pages.kejadian.show', compact('kejadian'));
    }

    /**
     * Tampilkan form edit data (UPDATE form)
     */
    public function edit(KejadianBencana $kejadian)
    {
        return view('pages.kejadian.edit', compact('kejadian'));
    }

    /**
     * Simpan perubahan data (UPDATE)
     */
    public function update(Request $request, KejadianBencana $kejadian)
    {
        $request->validate([
            'nama_bencana' => 'required|string|max:255',
            'tanggal'      => 'required|date',
            'lokasi'       => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = $request->only(['nama_bencana', 'tanggal', 'lokasi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($kejadian->gambar) {
                Storage::delete('public/' . $kejadian->gambar);
            }

            $path           = $request->file('gambar')->store('kejadian_bencana', 'public');
            $data['gambar'] = $path;
        }

        $kejadian->update($data);

        return redirect()->route('kejadian.index')
            ->with('success', 'Data kejadian bencana berhasil diperbarui.');
    }

    /**
     * Hapus data (DELETE)
     */
    public function destroy(KejadianBencana $kejadian)
    {
        if ($kejadian->gambar) {
            Storage::delete('public/' . $kejadian->gambar);
        }

        $kejadian->delete();

        return redirect()->route('kejadian.index')
            ->with('success', 'Data kejadian bencana berhasil dihapus.');
    }
}
