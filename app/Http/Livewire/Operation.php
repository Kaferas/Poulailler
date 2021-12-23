<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use App\Models\Operations;
use Livewire\Component;
use Livewire\WithPagination;

class Operation extends Component
{

    use WithPagination;
    public $depenseForm = 0;
    public $depenses;
    public $depense;
    public $motif;
    public $dernier;
    public  $montant;

    public function mount()
    {
        $this->depenses = Depenses::all();
    }

    public function dernierOperation()
    {
        $this->dernier = 1;
        $this->depenseForm = null;
    }

    public function adddepense()
    {
        $this->depenseForm = 1;
        $this->dernier = null;
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
        return view('livewire.operation', [
            'derniers' => Operations::paginate(5)
        ]);
    }
}
