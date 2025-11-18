<?php

namespace App\Http\Controllers;

use App\Models\DonasiBencana;
use App\Models\PoskoBencana;
use Illuminate\Http\Request;

class DonasiBencanaController extends Controller
{
    public function index()
    {
        $donasi = DonasiBencana::with('posko')->get();
        return view('pages.donasi.index', compact('donasi'));
    }

    public function create()
    {
        $posko = PoskoBencana::all();
        return view('pages.donasi.create', compact('posko'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posko_id' => 'required',
            'donatur_nama' => 'required',
            'jenis_donasi' => 'required',
            'nilai' => 'required|numeric',
        ]);

        DonasiBencana::create($request->all());

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $donasi = DonasiBencana::with('posko')->findOrFail($id);
        return view('pages.donasi.show', compact('donasi'));
    }

    public function edit($id)
    {
        $donasi = DonasiBencana::findOrFail($id);
        $posko = PoskoBencana::all();
        return view('pages.donasi.edit', compact('donasi', 'posko'));
    }

    public function update(Request $request, $id)
    {
        $donasi = DonasiBencana::findOrFail($id);
        $donasi->update($request->all());

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DonasiBencana::destroy($id);
        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil dihapus!');
    }
}
