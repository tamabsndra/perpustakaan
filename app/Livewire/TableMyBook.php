<?php

namespace App\Livewire;

use App\Models\Anggota;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TableMyBook extends Component
{
    public $Buku, $ID;

    public function find($id)
    {
        $this->ID = $id;
    }
    
    public function render()
    {
        $Anggota =  Anggota::find(Auth::user()->no_anggota);
        $this->Buku = $Anggota->bukuBelumDikembalikan();
        return view('livewire.table-my-book');
    }
}
