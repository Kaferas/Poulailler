<?php

namespace App\Http\Livewire;

use App\Models\Devis;
use App\Models\Clients;
use Livewire\Component;
use App\Models\Fabrication;
use App\Models\detail_devis;
use Illuminate\Support\Facades\Session;

class VenteFabrication extends Component
{
    public $fabProd;
    public $produit;
    public $fabPrix;
    public $fabVente;
    public $clients;
    public $client;
    public $limit;
    public $qty;

    public function mount()
    {
        $this->fabProd = Devis::where('etat', 1)->get();
        $this->clients = Clients::all();
    }

    public function triggerPrice()
    {
        $pro = detail_devis::where('devisId', $this->produit);
        $this->fabPrix = $pro->sum("montantMateriel");
        $this->limit = Devis::find($this->produit)->quantite;
    }

    public function save()
    {
        $this->validate([
            'qty' => "required|integer",
            'produit' => "required|integer",
            'fabPrix' => "required|integer",
            'fabVente' => "required|integer",
            'client' => "required|integer",
        ]);
        Fabrication::create([
            'produitId' => $this->produit,
            'prixFab' => $this->fabPrix,
            'prixvente' => $this->fabVente,
            'quantite' => $this->qty,
            'clientId' => $this->client,
        ]);
        $res = Devis::find($this->produit)->quantite - $this->qty;
        Devis::find($this->produit)->update(['quantite' => $res]);
        Session::flash('message', "Vente bien Faite");
    }
    public function render()
    {
        return view('livewire.vente-fabrication');
    }
}
