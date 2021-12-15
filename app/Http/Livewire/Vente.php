<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;

class Vente extends Component
{
    public $produits;
    public $produit;
    public $prixunitaire;
    public $qty;
    public $totalMount;
    public $rabais;
    public $maxQty = 1;
    public $client = null;

    public function addClient()
    {
        $this->client = 1;
    }
    public function calcultotal()
    {
        $this->totalMount = $this->prixunitaire * $this->qty;
    }

    public function triggerProduct()
    {
        $choosePro = Produit::find($this->produit);
        $this->prixunitaire = $choosePro->prixUnitaire;
        $this->maxQty = $choosePro->Quantite;
        // dd($choosePro);
    }
    public function mount()
    {
        $this->produits = Produit::all();
    }
    public function render()
    {
        return view('livewire.vente');
    }
}
