<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data ['dataWarga'] = Warga::paginate(10);
        return view('pages.warga.index', $data);

         $data ['dataUser']= User::paginate(10);
        return view('pages.user.index', $data);
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:wargas,nik',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit(Warga $warga)
    {
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:wargas,nik,' . $warga->id,
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $warga->update($validated);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }

    public function show(Warga $warga)
    {
    return view('pages.warga.show', compact('warga'));
    }

}
