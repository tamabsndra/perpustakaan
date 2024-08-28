<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'no_anggota';
    public $incrementing = false;
    protected $fillable = ['no_anggota', 'nama', 'no_ktp', 'tgl_lahir', 'tgl_bergabung'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'no_anggota');
    }

    public function bukuDipinjam()
    {
        return $this->belongsToMany(Buku::class, 'peminjamans', 'no_anggota', 'id_buku')
        ->withPivot('tgl_pinjam')
        ->withTimestamps();
    }

    public function bukuBelumDikembalikan()
    {
        return Buku::select(
            'bukus.id_buku',
            'bukus.judul_buku',
            'bukus.jumlah_halaman',
            'bukus.harga',
            'peminjamans.tgl_pinjam'
        )
            ->join('peminjamans', 'bukus.id_buku', '=', 'peminjamans.id_buku')
            ->leftJoin('pengembalians', function ($join) {
                $join->on('peminjamans.id_buku', '=', 'pengembalians.id_buku')
                ->on('peminjamans.no_anggota', '=', 'pengembalians.no_anggota');
            })
            ->where('peminjamans.no_anggota', $this->no_anggota)
            ->whereNull('pengembalians.tgl_kembali')
            ->groupBy(
                'bukus.id_buku',
                'bukus.judul_buku',
                'bukus.jumlah_halaman',
                'bukus.harga',
                'peminjamans.tgl_pinjam'
            )
            ->get();
    }

    public function bukuSudahDikembalikan()
    {
        return Buku::select(
            'bukus.judul_buku',
            'bukus.jumlah_halaman',
            'bukus.harga',
            'peminjamans.tgl_pinjam',
            'pengembalians.tgl_kembali',
            'pengembalians.created_at'
        )
        ->join('peminjamans', 'bukus.id_buku', '=', 'peminjamans.id_buku')
        ->leftJoin('pengembalians', function ($join) {
            $join->on('peminjamans.id_buku', '=', 'pengembalians.id_buku')
                ->on('peminjamans.no_anggota', '=', 'pengembalians.no_anggota');
        })
            ->where('peminjamans.no_anggota', $this->no_anggota)
            ->whereNotNull('pengembalians.tgl_kembali')
            ->groupBy(
                'bukus.judul_buku',
                'bukus.jumlah_halaman',
                'bukus.harga',
                'peminjamans.tgl_pinjam',
                'pengembalians.tgl_kembali',
                'pengembalians.created_at'
            )
            ->get();
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'no_anggota');
    }
}
