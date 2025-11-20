<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KejadianBencanaFactory extends Factory
{
    public function definition()
    {
        $jenisBencana = [
            'Banjir',
            'Tanah Longsor',
            'Gempa Bumi',
            'Kebakaran Hutan',
            'Angin Puting Beliung',
            'Tsunami',
            'Kekeringan',
        ];

        return [
            'nama_bencana' => fake()->randomElement($jenisBencana),
            'tanggal'      => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'lokasi'       => fake()->city(),
            'deskripsi'    => fake()->paragraphs(3, true),
            'gambar'       => 'kejadian_bencana/noimage.png',
        ];
    }
}
