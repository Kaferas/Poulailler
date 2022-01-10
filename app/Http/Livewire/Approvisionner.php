<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Categories;
use App\Models\Devis;
use App\Models\detail_devis;
use App\Models\HistoryStock;

class Approvisionner extends Component
{
    public $produits;
    public $produit;
    public $qty;
    public $price;
    public $categories;
    public $categorie;
    public $code;
    public $history;
    private $lastly;
    public $rubrique = "fini";

    public function mount()
    {
        $this->rubrique = "fini";
        $this->produits = $this->rubrique == "fini" ? Produit::all() : Devis::all();
        $this->categories = Categories::all();
    }

    public function getLast()
    {
        return $this->lastly;
    }

    public function getnewly()
    {
        return $this->history;
    }

    public function triggerHistory()
    {
        if ($this->rubrique == "premiere") {
            dd("Biiiiig");
            $pro = Produit::where("id", $this->produit)->first()->codeProduit;
            $this->price = Produit::where("id", $this->produit)->first()->prixUnitaire;
            $this->history = HistoryStock::where("codeProduit", $pro)->orderBy("id", "DESC")->first();
            $this->lastly = isset($this->history->restJson) == null ?  "{}" : json_decode($this->history->restJson);
            $this->dispatchBrowserEvent("whaoou", [$this->getLast(), $this->getnewly()]);
        }
        if ($this->rubrique == "fini") {
            $this->price = detail_devis::where('devisId', $this->produit)->sum("montantMateriel");
            // sio
            // dd($this->price);
        }
    }
    public function trigger()
    {
        if ($this->rubrique == "premiere") {
            $this->produits = Produit::all();
        } elseif ($this->rubrique == "fini") {

            $this->produits = Devis::all();
        }
    }

    public function save()
    {
        $this->validate([
            'rubrique' => "required",
            'produit' => "required",
            "qty" => "required|integer",
            "price" => "required|integer",
            'categorie' => "required"
        ]);
        // dd($this->produit);
        if ($this->rubrique == "premiere") {
            // dd("Puuuuf");
            $restant = Produit::find($this->produit);
            HistoryStock::create([
                'codeProduit' => $restant->codeProduit,
                'quantite' => $this->qty,
                'prixUnite' => $this->price,
                'catId' => $this->categorie,
                'restJson' => json_encode($restant)
            ]);
            // dd($restant);
            $restant->update([
                'Quantite' => $this->qty + $restant->Quantite,
                'prixUnitaire' => $this->price,
                'catId' => $this->categorie
            ]);
            return redirect(request()->header('Referer'));
        }
        if ($this->rubrique == "fini") {
            dd("Yeaaaa");
            $restant = Devis::find($this->produit);
            HistoryStock::create([
                'codeProduit' => $restant->codeProduit,
                'quantite' => $this->qty,
                'prixUnite' => $this->price,
                'restJson' => json_encode($restant)
            ]);
            $restant->update([
                'quantite' => $this->qty + $restant->quantite,
                'prixUnite' => $this->price,
                'catId' => $this->categorie
            ]);
            return redirect(request()->header('Referer'));
        }
    }

    public function render()
    {
        return view('livewire.approvisionner');
    }
}
