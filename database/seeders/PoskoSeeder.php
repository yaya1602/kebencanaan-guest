<?php

namespace Database\Seeders;

use App\Models\PoskoBencana;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoskoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //      PoskoBencana::create([
    //         'nama_posko' => 'Posko Utama',
    //         'alamat' => 'Jl. Merdeka No.1',
    //         'kontak' => '081234567890',
    //         'penanggung_jawab' => 'Budi Santoso',
    //     ]);

    //     PoskoBencana::create([
    //         'nama_posko' => 'Posko Barat',
    //         'alamat' => 'Jl. Kenangan No.25',
    //         'kontak' => '081298765432',
    //         'penanggung_jawab' => 'Siti Aminah',
    //     ]);

    // }
    public function run(): void
{
    // jumlah data yang ingin dibuat
    $jumlah = 100;

    for ($i = 0; $i < $jumlah; $i++) {
        PoskoBencana::create([
            'nama_posko' => fake()->company(),            // nama posko random
            'alamat' => fake()->address(),                // alamat random
            'kontak' => fake()->phoneNumber(),            // nomor kontak random
            'penanggung_jawab' => fake()->name(),         // nama penanggung jawab random
        ]);
    }
}
}
