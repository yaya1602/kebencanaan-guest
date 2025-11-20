<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID'); // Faker Indonesia

        for ($i = 0; $i < 100; $i++) {
            Warga::create([
                'nama_lengkap' => $faker->name(),
                'nik'          => $faker->unique()->numerify('################'),
                'alamat'       => $faker->address(),
                'no_telepon'   => $faker->phoneNumber(),
                'jenis_kelamin'=> $faker->randomElement(['Laki-laki', 'Perempuan']),
            ]);
        }
    }
}
