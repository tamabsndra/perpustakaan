<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_buku';
    protected $fillable = ['judul_buku', 'stok', 'jumlah_halaman', 'harga'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'id_buku');
    }

    public function peminjam()
    {
        return $this->belongsToMany(Anggota::class, 'peminjaman', 'id_buku', 'no_anggota')
        ->withPivot('tgl_pinjam')
        ->withTimestamps();
    }

    public function bukuTersedia()
    {
        $totalStok = $this->stok;

        $dipinjam = Pengembalian::whereNull('tgl_kembali')
        ->where('id_buku', $this->id_buku)
        ->count();

        return $totalStok - $dipinjam;

    }

    public function isDipinjamOleh($no_anggota, $idBuku)
    {
        return Peminjaman::where('peminjamans.id_buku', $idBuku)
        ->where('peminjamans.no_anggota', $no_anggota)
        ->leftJoin('pengembalians', function ($join) {
            $join->on('peminjamans.id_buku', '=', 'pengembalians.id_buku')
            ->on('peminjamans.no_anggota', '=', 'pengembalians.no_anggota');
        })
            ->whereNull('pengembalians.tgl_kembali')
            ->exists();                                  
    }

    public function getBorrowedBooks()
    {
        return Buku::select(
            'bukus.judul_buku',
            'anggotas.nama',
            'peminjamans.tgl_pinjam',
            'pengembalians.tgl_kembali',
            'pengembalians.created_at'
        )
            ->join('peminjamans', 'bukus.id_buku', '=', 'peminjamans.id_buku')
            ->join('anggotas', 'peminjamans.no_anggota', '=', 'anggotas.no_anggota')
            ->leftJoin('pengembalians', function ($join) {
                $join->on('peminjamans.id_buku', '=', 'pengembalians.id_buku')
                ->on('peminjamans.no_anggota', '=', 'pengembalians.no_anggota');
            })
            ->groupBy(
                'bukus.judul_buku',
                'anggotas.nama',
                'peminjamans.tgl_pinjam',
                'pengembalians.tgl_kembali',
                'pengembalians.created_at'
            )
            ->get();
    }
}
