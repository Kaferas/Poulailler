<?php

namespace App\Http\Livewire;

use App\Models\Ventes;
use App\Models\Clients;
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
    public $clients;
    public $clientslist;
    public $paymethod;

    public function addClient()
    {
        $this->client = 1;
    }
    public function calcultotal()
    {
        $this->totalMount = $this->prixunitaire * $this->qty;
    }

    public function recalcule()
    {
        $this->totalMount = $this->totalMount - (($this->rabais * $this->prixunitaire) / 100 * $this->qty);
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
        $this->produits = Produit::where('Quantite', '>', 0)->get();
        $this->clients = Clients::all();
    }

    public function save()
    {
        $this->validate([
            'produit' => "required|integer",
            'prixunitaire' => "required|integer",
            'qty' => "required|integer",
            'totalMount' => "required|integer",
            'rabais' => "integer",
            'clientslist' => "required|integer",
            'paymethod' => "required|string"
        ]);
        Ventes::create([
            'prodId' => $this->produit,
            'montantUnit' => $this->prixunitaire,
            'qty' => $this->qty,
            'totalAmount' => $this->totalMount,
            'rabais' => $this->rabais,
            'ClientId' => $this->clientslist,
            'paymethod' => $this->paymethod
        ]);
        $res = Produit::find($this->produit)->Quantite - $this->qty;
        Produit::find($this->produit)->update(["Quantite" => $res]);
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.vente');
    }
}
