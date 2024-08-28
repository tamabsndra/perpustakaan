<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $primaryKey = 'id_peminjaman';
    protected $fillable = ['no_anggota', 'id_buku', 'tgl_pinjam'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'no_anggota');
    }
}
