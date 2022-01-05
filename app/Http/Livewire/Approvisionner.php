<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Categories;
use App\Models\Devis;
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
    public $rubrique="fini";

    public function mount(){
    $this->produits=Produit::all();   
    $this->categories=Categories::all();
    // {dd(json_decode(HistoryStock::latest()->first()->restJson));
        // dd($this->produits);
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
        if($this->rubrique == "premiere")
        {
            $pro=Produit::where("id",$this->produit)->first()->codeProduit;
            $this->price=Produit::where("id",$this->produit)->first()->prixUnitaire;
            $this->history=HistoryStock::where("codeProduit",$pro)->first();   
            $this->lastly=isset($this->history->restJson) == null ?  "{}" : json_decode($this->history->restJson)  ;
            $this->dispatchBrowserEvent("whaoou",[$this->getLast(),$this->getnewly()]);
        }
        if($this->rubrique == "fini"){
            
            $this->history=Devis::find($this->produit);   
            
        }
    }
    public function trigger()
    {
        if($this->rubrique == "premiere")
        {
            $this->produits=Produit::all();   
            
        }elseif($this->rubrique == "fini"){
            
            $this->produits=Devis::all();   
        }
    
    }

    public function save(){
        $this->validate([
            'rubrique'=>"required",
            'produit'=>"required",
            "qty"=>"required|integer",
            "price"=>"required|integer"
        ]);
        // dd($this->produit);
        if($this->rubrique == "premiere"){
            $restant=Produit::find($this->produit);
            HistoryStock::create([
                'codeProduit'=>$restant->codeProduit,
                'quantite'=>$this->qty,
                'prixUnite'=>$this->price,
                'catId'=>$this->categorie,
                'restJson'=>json_encode($restant)
            ]);
            $restant->update([
                'Quantite'=>$this->qty,
                'prixUnitaire'=>$this->price,
                'catId'=>$this->categorie
            ]);
            return redirect(request()->header('Referer'));
        }
        if($this->rubrique == "fini"){
            $restant=Devis::find($this->produit);
            HistoryStock::create([
                'codeProduit'=>$restant->codeProduit,
                'quantite'=>$this->qty,
                'prixUnite'=>$this->price,
                'restJson'=>json_encode($restant)
            ]);
            $restant->update([
                    'quantite'=>$this->qty,
                    'prixUnite'=>$this->price,
                    'catId'=>$this->categorie
                ]);
                return redirect(request()->header('Referer'));
        }

    }

    public function render()
    {
        return view('livewire.approvisionner');
    }
}
