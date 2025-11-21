<?php
namespace App\Http\Controllers;

use App\Models\KejadianBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KejadianController extends Controller
{
    /**
     * Tampilkan semua data kejadian bencana (READ)
     */
    public function index(Request $request)
    {
        // Kolom yang boleh difilter
        $filterable = ['nama_bencana'];

        // Kolom yang bisa dicari
        $searchableColumns = ['nama_bencana', 'lokasi', 'tanggal', 'deskripsi'];

        $dataKejadian = KejadianBencana::query()
            ->filter($request, $filterable)
            ->search($request, $searchableColumns)
            ->paginate(10);
            

        // Ambil list nama_bencana untuk isi select
        $jenisBencana = KejadianBencana::select('nama_bencana')->distinct()->get();

        return view('pages.kejadian.index', compact('dataKejadian', 'jenisBencana'));
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
