<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestKebencanaanController extends Controller
{
    public function index()
{
// Data dummy untuk tamu/guest (tanpa login)
$kejadian = [
[
'kejadian_id' => 1,
'jenis_bencana' => 'Banjir',
'tanggal' => '2024-10-20',
'lokasi_text' => 'Desa alamraya, RT 01 / RW 05',
'status_kejadian' => 'Aktif'
],
[
'kejadian_id' => 2,
'jenis_bencana' => 'Tanah Longsor',
'tanggal' => '2025-09-22',
'lokasi_text' => 'Desa tanah datar, RT 03 / RW 01',
'status_kejadian' => 'Selesai'
]
];
// Passing data ke view
return view('kejadian', compact('kejadian'));
}

}
