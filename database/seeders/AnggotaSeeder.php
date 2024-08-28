<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anggota::create([
            'no_anggota' => 'AG001',
            'nama' => 'Rahmat',
            'no_ktp' => '1234567890123456',
            'tgl_lahir' => '2000-01-01',
            'tgl_bergabung' => '2024-01-01',
        ]);

        Anggota::create([
            'no_anggota' => 'AG002',
            'nama' => 'Rizqi',
            'no_ktp' => '1234567890123457',
            'tgl_lahir' => '2001-02-15',
            'tgl_bergabung' => '2024-02-15',
        ]);

        Anggota::create([
            'no_anggota' => 'AG003',
            'nama' => 'Rachel',
            'no_ktp' => '1234567890123458',
            'tgl_lahir' => '2002-03-10',
            'tgl_bergabung' => '2024-03-10',
        ]);
    }
}
