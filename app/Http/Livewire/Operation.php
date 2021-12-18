<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use App\Models\Operations;
use Livewire\Component;

class Operation extends Component
{
    public $depenseForm = 0;
    public $depenses;
    public $depense;
    public $motif;
    public  $montant;

    public function mount()
    {
        $this->depenses = Depenses::all();
    }

    public function adddepense()
    {
        $this->depenseForm = 1;
    }

    public function save()
    {
        $this->validate([
            'motif' => "string",
            'depense' => "required|integer",
            'montant' => "required|integer"
        ]);
        Operations::create([
            'motif' => $this->motif,
            'montant' => $this->montant,
            'depenseId' => $this->depense
        ]);
        return redirect(request()->header('Referer'));
    }


    public function render()
    {
        return view('livewire.operation');
    }
}
