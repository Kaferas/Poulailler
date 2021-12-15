<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Finance extends Component
{
    use WithPagination;
    public $vente = 0;
    public $operation = 0;

    public function changeVente()
    {
        $this->vente = 1;
        $this->operation = 0;
    }
    public function changeOperation()
    {
        $this->operation = 1;
        $this->vente = 0;
    }
    public function render()
    {
        return view('livewire.finance');
    }
}
