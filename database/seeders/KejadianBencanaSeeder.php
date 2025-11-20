<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KejadianBencana;

class KejadianBencanaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID'); // faker lokal Indonesia

        $jenisBencana = [
            'Banjir',
            'Tanah Longsor',
            'Gempa Bumi',
            'Kebakaran Hutan',
            'Angin Puting Beliung',
            'Tsunami',
            'Kekeringan',
        ];

        for ($i = 0; $i < 100; $i++) {

            KejadianBencana::create([
                'nama_bencana' => $faker->randomElement($jenisBencana),
                'tanggal'      => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'lokasi'       => $faker->city(),
                'deskripsi'    => $faker->paragraph(4),
                'gambar'       => 'kejadian_bencana/noimage.png', // gambar default
            ]);
        }
    }
}
