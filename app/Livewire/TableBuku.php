<?php

namespace App\Livewire;

use App\Models\Buku;
use Livewire\Component;

class TableBuku extends Component
{
    public $buku, $Judul, $Harga, $Stok, $Halaman, $ID;

    public function edit($id){
        $this->ID = $id;
        $Data = Buku::findOrFail($id);
        $this->Judul = $Data->judul_buku;
        $this->Harga = $Data->harga;
        $this->Stok = $Data->stok;
        $this->Halaman = $Data->jumlah_halaman;
    }

    public function delete($id)
    {
        $this->ID = $id;
    }

    public function render()
    {
        $this->buku = Buku::all();
        return view('livewire.table-buku');
    }
}
