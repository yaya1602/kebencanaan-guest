<?php

namespace App\Http\Controllers;

use App\Models\PoskoBencana;
use Illuminate\Http\Request;

class PoskoBencanaController extends Controller
{
    public function index()
    {
        $posko = PoskoBencana::all();
        return view('pages.posko.index', compact('posko'));
    }

    public function create()
    {
        return view('pages.posko.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_posko' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'penanggung_jawab' => 'required',
        ]);

        PoskoBencana::create($request->all());

        return redirect()->route('posko.index')->with('success', 'Posko berhasil ditambahkan!');
    }

    public function show($id)
    {
        $posko = PoskoBencana::with('donasi')->findOrFail($id);
        return view('pages.posko.show', compact('posko'));
    }

    public function edit($id)
    {
        $posko = PoskoBencana::findOrFail($id);
        return view('pages.posko.edit', compact('posko'));
    }

    public function update(Request $request, $id)
    {
        $posko = PoskoBencana::findOrFail($id);
        $posko->update($request->all());

        return redirect()->route('posko.index')->with('success', 'Posko berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PoskoBencana::destroy($id);
        return redirect()->route('posko.index')->with('success', 'Posko berhasil dihapus!');
    }
}
