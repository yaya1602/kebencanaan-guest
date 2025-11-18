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
    public function run(): void
    {
        DonasiBencana::create([
            'posko_id' => 1,
            'donatur_nama' => 'Joko',
            'jenis_donasi' => 'Uang',
            'nilai' => 500000,
        ]);

        DonasiBencana::create([
            'posko_id' => 1,
            'donatur_nama' => 'Ani',
            'jenis_donasi' => 'Sembako',
            'nilai' => 0,
        ]);

        DonasiBencana::create([
            'posko_id' => 2,
            'donatur_nama' => 'CV Berkah',
            'jenis_donasi' => 'Makanan',
            'nilai' => 0,
        ]);

    }
}
