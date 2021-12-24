<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
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
    public $from = null;
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

    public function render()
    {
        return view('livewire.finance', [
            'total' => Ventes::sum("totalAmount"),
            'totalDep' => Operations::sum("montant"),
            'fabrication' => Fabrication::sum("prixvente"),
            'operations' => Operations::where(function ($query) {
                if ($this->from != "" && $this->to != "") {
                    $query->whereBetween('created_at', [$this->from, $this->to]);
                } else {
                    $query = Operations::all();
                }
            })->paginate(10)
        ]);
    }
}
