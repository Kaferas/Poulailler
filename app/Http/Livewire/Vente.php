<?php

namespace App\Http\Livewire;

use App\Models\Ventes;
use App\Models\Clients;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Vente extends Component
{
    use WithPagination;

    public $produits;
    public $produit;
    public $prixunitaire;
    public $qty;
    public $min = 1;
    public $venteid = 0;
    public $totalMount;
    public $rabais = 0;
    public $maxQty = 1;
    public $client = null;
    public $clients;
    public $clientslist;
    public $datePaie;
    public $paymethod;
    public $numeroChek;
    public $allPro = 0;
    public $reports;
    public $etat;
    public $reparation;

    public function afficherPro()
    {
        $this->allPro = 1;
        $this->client = 0;
        // $this->reports = Ventes::orderBy('id', "DESC")->get();
        // $reports = Ventes::paginate(7);
        // $links = $reports->links();
        // $this->reports = collect($reports->items());
    }
    public function addClient()
    {
        $this->client = 1;
        $this->allPro = 0;
    }
    public function calcultotal()
    {
        $this->totalMount = $this->prixunitaire * $this->qty;
    }

    public function recalcule()
    {
        $this->totalMount = $this->totalMount - $this->rabais ;
    }
    public function triggerProduct()
    {
        $choosePro = Produit::find($this->produit);
        $this->prixunitaire = $choosePro->prixUnitaire;
        $this->maxQty = $choosePro->Quantite;
        $this->reparation=Ventes::where("prodId",$this->produit)->where("etat",'reparation')->count();
        // dd($choosePro);
    }
    public function mount()
    {
        $this->produits = Produit::all();
        $this->clients = Clients::where('etat', 1)->get();
        $this->reports = Ventes::all();
    }

    public function modVente($venteid)
    {
        // dd($this->produits);
        // $this->venteid = $venteid;
        // $found = Ventes::find($this->venteid);
        // $this->produit = $found->prodId;
        // $this->prixunitaire = $found->montantUnit;
    }

    public function save()
    {
        $this->validate([
            'produit' => "required|integer",
            'prixunitaire' => "required|integer",
            'qty' => "required|integer",
            'totalMount' => "required|integer",
            'rabais' => "integer",
            'paymethod' => "string",
            'etat' => "string"
        ]);
        $ventId = Ventes::create([
            'prodId' => $this->produit,
            'montantUnit' => $this->prixunitaire,
            'qty' => $this->qty,
            'totalAmount' => $this->totalMount,
            'rabais' => $this->rabais,
            'ClientId' => $this->clientslist,
            'userId' => Auth::user()->id,
            'numeroChek' => $this->numeroChek,
            'paymethod' => $this->paymethod,
            'datePaie'=>$this->datePaie,
            'etat'=>$this->etat
        ]);

        $res = Produit::find($this->produit)->Quantite - $this->qty;
        Produit::find($this->produit)->update(["Quantite" => $res]);
        return redirect(route("receipt-vente", $ventId));
    }
    public function render()
    {
        return view('livewire.vente');
    }
}
