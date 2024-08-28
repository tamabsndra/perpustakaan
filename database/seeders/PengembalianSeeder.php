<?php

namespace Database\Seeders;

use App\Models\Pengembalian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengembalianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengembalian::create([
            'no_anggota' => 'AG001',
            'id_buku' => 1,
            'tgl_kembali' => '2024-08-10',
        ]);

        Pengembalian::create([
            'no_anggota' => 'AG002',
            'id_buku' => 2,
            'tgl_kembali' => '2024-08-20',
        ]);

        Pengembalian::create([
            'no_anggota' => 'AG003',
            'id_buku' => 3,
            'tgl_kembali' => '2024-08-25',
        ]);
    }
}
