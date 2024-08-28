<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengembalian';
    protected $fillable = ['no_anggota', 'id_buku', 'tgl_kembali'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'no_anggota');
    }
}
