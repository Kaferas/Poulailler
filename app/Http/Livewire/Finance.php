<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use App\Models\Ventes;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Operations;

class Finance extends Component
{
    use WithPagination;
    public $vente = 1;
    public $operation = 0;
    public $products;
    public $depenseForm = 0;
    protected $listeners = [
        'pop' => 'popin'
    ];

    public function popin($id)
    {
        $this->depenseForm = $id;
    }

    public function mount()
    {
        $this->products = Produit::all();
    }

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
        return view('livewire.finance', [
            'total' => Ventes::sum("totalAmount"),
            'totalDep' => Operations::sum("montant")
        ]);
    }
}
