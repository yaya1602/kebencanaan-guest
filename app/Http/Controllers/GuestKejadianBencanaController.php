<?php

namespace App\Http\Controllers;

use App\Models\KejadianBencana; // Pastikan model di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk mengelola file (gambar)
use Illuminate\Support\Str; 

class GuestKejadianBencanaController extends Controller
{
    /**
     * Menampilkan daftar kejadian bencana. (READ)
     */
    public function index()
    {
        // Ambil data terbaru, paginasi 9 data per halaman
        // Perbaiki juga path view-nya agar mencari di dalam folder 'guest/kejadian'
        // Berdasarkan screenshot Anda (image_82b79d.png), file Anda ada di 'resources/views/guest/kejadian/index.blade.php'
        
        $kejadianBencanas = KejadianBencana::latest()->paginate(9); 
        return view('guest.kejadian.index', compact('kejadianBencanas'));
    }

    /**
     * Menampilkan form untuk membuat kejadian bencana baru. (CREATE - Form)
     */
    public function create()
    {
        // Arahkan ke view 'resources/views/guest/kejadian/create.blade.php'
        return view('guest.kejadian.create');
    }

    /**
     * Menyimpan data kejadian bencana baru ke database. (CREATE - Store)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_bencana' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Cek jika ada file gambar yang di-upload
        if ($request->hasFile('gambar')) {
            // Simpan gambar ke storage/app/public/kejadian_bencana
            $path = $request->file('gambar')->store('public/kejadian_bencana');
            // Simpan path yang relatif ke 'public' folder (tanpa 'public/')
            $data['gambar'] = Str::after($path, 'public/'); 
        }

        KejadianBencana::create($data);

        return redirect()->route('kejadian-bencana.index')
                         ->with('success', 'Data kejadian bencana berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu kejadian bencana. (READ - Detail)
     */
    public function show(KejadianBencana $kejadianBencana)
    {
        // $kejadianBencana sudah otomatis di-inject oleh Laravel berdasarkan ID di URL
        // Arahkan ke view 'resources/views/guest/kejadian/show.blade.php'
        return view('guest.kejadian.show', compact('kejadianBencana'));
    }

    /**
     * Menampilkan form untuk mengedit kejadian bencana. (UPDATE - Form)
     */
    public function edit(KejadianBencana $kejadianBencana)
    {
        // Arahkan ke view 'resources/views/guest/kejadian/edit.blade.php'
        return view('guest.kejadian.edit', compact('kejadianBencana'));
    }

    /**
     * Memperbarui data kejadian bencana di database. (UPDATE - Store)
     */
    public function update(Request $request, KejadianBencana $kejadianBencana)
    {
       // 1. Validasi data (Ini sudah benar)
    $request->validate([
        'nama_bencana' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    ]);

    // 2. SIMPAN DATA TEKS SECARA MANUAL
    $kejadianBencana->nama_bencana = $request->nama_bencana;
    $kejadianBencana->lokasi = $request->lokasi;
    $kejadianBencana->deskripsi = $request->deskripsi;
    $kejadianBencana->tanggal = $request->tanggal;

    // 3. LOGIKA FILE GAMBAR (Kode Anda sudah benar, kita pakai lagi)
    if ($request->hasFile('gambar')) {
        
        // Hapus gambar lama jika ada
        if ($kejadianBencana->gambar) {
            Storage::delete('public/' . $kejadianBencana->gambar);
        }
        
        // Simpan gambar baru
        $path = $request->file('gambar')->store('public/kejadian_bencana');
        
        // Simpan path baru ke model
        $kejadianBencana->gambar = Str::after($path, 'public/');
    }

    // 4. SIMPAN SEMUA PERUBAHAN KE DATABASE
    $kejadianBencana->save(); // <-- Menggunakan save(), bukan update($data)

    // 5. Redirect (Ini sudah benar)
    return redirect()->route('kejadian-bencana.index')
                     ->with('success', 'Data kejadian bencana berhasil diperbarui.');

    }

    /**
     * Menghapus data kejadian bencana dari database. (DELETE)
     */
    public function destroy(KejadianBencana $kejadianBencana)
    {
        // Hapus gambar terkait jika ada
        if ($kejadianBencana->gambar) {
            Storage::delete('public/' . $kejadianBencana->gambar);
        }
        
        $kejadianBencana->delete();

        return redirect()->route('kejadian-bencana.index')
                         ->with('success', 'Data kejadian bencana berhasil dihapus.');
    }
}

