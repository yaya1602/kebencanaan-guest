<?php

namespace Database\Seeders;

use App\Models\DonasiBencana;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     DonasiBencana::create([
    //         'posko_id' => 1,
    //         'donatur_nama' => 'Joko',
    //         'jenis_donasi' => 'Uang',
    //         'nilai' => 500000,
    //     ]);

    //     DonasiBencana::create([
    //         'posko_id' => 1,
    //         'donatur_nama' => 'Ani',
    //         'jenis_donasi' => 'Sembako',
    //         'nilai' => 0,
    //     ]);

    //     DonasiBencana::create([
    //         'posko_id' => 2,
    //         'donatur_nama' => 'CV Berkah',
    //         'jenis_donasi' => 'Makanan',
    //         'nilai' => 0,
    //     ]);

    // }

    public function run(): void
{
    // Jumlah data donasi otomatis
    $jumlah = 100;

    for ($i = 0; $i < $jumlah; $i++) {

        // Pilihan jenis donasi
        $jenisDonasi = ['Uang', 'Sembako', 'Makanan'];

        $jenis = fake()->randomElement($jenisDonasi);

        // Jika jenis donasi uang → nilai random
        // Jika barang → nilai = 0
        $nilai = $jenis === 'Uang'
            ? fake()->numberBetween(50000, 2000000)
            : 0;

        DonasiBencana::create([
            'posko_id' => fake()->numberBetween(1, 5),  // asumsi posko id 1–5
            'donatur_nama' => fake()->name(),
            'jenis_donasi' => $jenis,
            'nilai' => $nilai,
        ]);
    }
}

}
