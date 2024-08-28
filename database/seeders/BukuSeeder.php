<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'judul_buku' => 'Laravel for Beginners',
            'stok' => 10,
            'jumlah_halaman' => 300,
            'harga' => 150000,
        ]);

        Buku::create([
            'judul_buku' => 'Mastering PHP',
            'stok' => 5,
            'jumlah_halaman' => 450,
            'harga' => 200000,
        ]);

        Buku::create([
            'judul_buku' => 'Understanding Databases',
            'stok' => 7,
            'jumlah_halaman' => 350,
            'harga' => 175000,
        ]);
    }
}
