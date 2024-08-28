<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::create([
            'no_anggota' => 'AG001',
            'id_buku' => 1,
            'tgl_pinjam' => '2024-08-01',
        ]);

        Peminjaman::create([
            'no_anggota' => 'AG002',
            'id_buku' => 2,
            'tgl_pinjam' => '2024-08-10',
        ]);

        Peminjaman::create([
            'no_anggota' => 'AG003',
            'id_buku' => 3,
            'tgl_pinjam' => '2024-08-15',
        ]);
    }
}
