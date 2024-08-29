<?php

namespace App\Livewire;

use App\Models\Anggota;
use Livewire\Component;

class TableMember extends Component
{
    public $members;

    public function render()
    {
        $this->members = Anggota::all();
        return view('livewire.table-member');
    }
}
