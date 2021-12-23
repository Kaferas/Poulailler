<?php

namespace App\Http\Livewire;

use App\Models\Ventes;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Depenses;
use App\Models\Operations;
use App\Models\Fabrication;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Model;

class Finance extends Component
{
    use WithPagination;
    public $vente = 1;
    public $operation = 0;
    public $products;
    public $depenseForm = 0;
    public $rapport;
    public $db;
    public $base;
    public $from;
    public $to;

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
        $this->rapport = 0;
    }
    public function changeRapport()
    {
        $this->vente = 0;
        $this->rapport = 1;
        $this->operation = 0;
    }
    public function changeOperation()
    {
        $this->operation = 1;
        $this->vente = 0;
        $this->rapport = 0;
    }
    public function decision()
    {
        if ($this->db == "Fabrications") {
            return Fabrications::class;
        } elseif ($this->db == "Produits") {
            return  Produits::class;
        } else {
            return Produits::class;
        }
    }
    public function render()
    {
        return view('livewire.finance', [
            'total' => Ventes::sum("totalAmount"),
            'totalDep' => Operations::sum("montant"),
            'fabrication' => Fabrication::sum("prixvente"),

        ]);
    }
}
