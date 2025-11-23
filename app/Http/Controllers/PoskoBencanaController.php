<?php
namespace App\Http\Controllers;

use App\Models\PoskoBencana;
use Illuminate\Http\Request;

class PoskoBencanaController extends Controller
{
    public function index(Request $request)
{
    $filterable = ['penanggung_jawab'];

    // Kolom yang bisa dicari (search bar)
    $searchableColumns = ['nama_posko', 'alamat', 'penanggung_jawab'];


    // List dropdown
    $listPJ = PoskoBencana::select('penanggung_jawab')
        ->distinct()
        ->get();

    // Data posko hasil filter
    $dataPosko = PoskoBencana::query()
        ->filter($request, $filterable)
        ->search($request, $searchableColumns)
        ->paginate(10);

    
    // Kolom yang bisa dicari (search bar)
    $searchableColumns = ['nama_posko', 'alamat', 'penanggung_jawab'];


    return view('pages.posko.index', [
        'listPJ' => $listPJ,
        'PoskoBencana' => $dataPosko
    ]);
}


    public function create()
    {
        return view('pages.posko.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_posko'       => 'required',
            'alamat'           => 'required',
            'kontak'           => 'required',
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
