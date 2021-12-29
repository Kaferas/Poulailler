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
    public $current;
    public $clients;
    public $client;
    public $modForm = 0;
    public $limit;
    public $dernier = 0;
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
    public function afficherDernier()
    {
        $this->dernier = 1;
    }

    public function resetField()
    {
        $this->produit = null;
        $this->fabPrix = null;
        $this->fabVente = null;
        $this->qty = null;
        $this->client = null;
    }

    public function save()
    {
        $this->validate([
            'qty' => "required|integer",
            'produit' => "required|integer",
            'fabPrix' => "required|integer",
            'fabVente' => "required|integer"
        ]);
        $data = [
            'produitId' => $this->produit,
            'prixFab' => $this->fabPrix,
            'prixvente' => $this->fabVente,
            'quantite' => $this->qty,
            'clientId' => $this->client,
        ];
        if ($this->current) {
            Fabrication::find($this->current)->update($data);
        } else {
            $fab = Fabrication::create($data);
        }
        $res = Devis::find($this->produit)->quantite - $this->qty;
        Devis::find($this->produit)->update(['quantite' => $res]);
        return redirect(route("receipt", $fab->id));
        // Session::flash('message', "Vente bien Faite");
        // $this->resetField();
    }
    public function modFabric($here)
    {
        $this->modForm = 2;
        $this->current = $here;
        $found = Fabrication::find($this->current);
        $this->produit = $found->produitId;
        $this->fabPrix = $found->prixFab;
        $this->fabVente = $found->prixvente;
        $this->qty = $found->quantite;
        $this->client = $found->clientId ?? null;
    }
    public function render()
    {
        return view('livewire.vente-fabrication', [
            'all' => Fabrication::paginate(5)
        ]);
    }
}
