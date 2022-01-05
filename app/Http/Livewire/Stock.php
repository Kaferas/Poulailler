<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;
use App\Models\Categories;
use App\Models\Fournisseurs;
use App\Models\Ventes;
use Livewire\WithPagination;

class Stock extends Component
{

    use WithPagination;

    public $search;
    public $edition = null;
    public $vfabr;
    public $aproduit = 1;
    public $approvision = 0;
    public $vproduit = 0;
    public $categorie;
    public $report = 0;
    public $categorieid;
    public $categories;
    public $codePro;
    public $nomPro;
    public $priUnit;
    public $produits;
    public $qty;
    public $from;
    public $to;
    // public $fournisseurs;
    public $afficherPro = null;

    public function affProduit()
    {
        $this->afficherPro = 1;
        $this->edition = null;
        $this->categorie = null;
    }

    public function selectItem($id)
    {
        $this->edition = 1;
        // dd($id);
        $editable = Produit::find($id);
        // dd($editable);
        $this->codePro = $editable->codeProduit;
        $this->nomPro = $editable->nomProduit;
        $this->priUnit = $editable->prixUnitaire;
        $this->categorieid = $editable->catId;
        $this->qty = $editable->Quantite;
    }
    public function mount()
    {
        $this->produits = Produit::select("codeProduit")->get()->toArray();
        do {
            $this->codePro = rand(4899439, 99089438954);
        } while (in_array($this->codePro, $this->produits));
        $this->categories = Categories::all();
    }
    public function vappro()
    {
        $this->report = 0;
        $this->vfabr = 0;
        $this->aproduit = 0;
        $this->vproduit = 0;
        $this->approvision=1;
    }
    public function vfabrication()
    {
        $this->report = 0;
        $this->approvision=0;
        $this->vfabr = 1;
        $this->aproduit = 0;
        $this->vproduit = 0;
    }
    public function ajPro()
    {
        $this->approvision=0;
        $this->aproduit = 1;
        $this->vfabr = 0;
        $this->vproduit = 0;
        $this->report = 0;
    }
    public function changePro()
    {
        $this->approvision=0;
        $this->aproduit = 0;
        $this->vfabr = 0;
        $this->vproduit = 1;
        $this->report = 0;
    }
    public function vreport()
    {
        $this->approvision=0;
        $this->aproduit = 0;
        $this->vfabr = 0;
        $this->vproduit = 0;
        $this->report = 2;
    }
    public function displaymodal()
    {
        $this->categorie = 2;
        $this->afficherPro = null;
    }
    public function displaymodalF()
    {
        $this->afficherPro = null;

        $this->categorie = null;
    }
    public function resetFields()
    {
        $this->codeProduit = null;
        $this->nomPro = null;
        $this->priUnit = null;
        $this->categorieid = null;
        $this->qty = null;
    }

    public function save()
    {
        // dd("Yeeeeeesa");
        $this->validate([
            'nomPro' => "required|string",
            'priUnit' => "required|integer",
            'categorieid' => "required|integer",
            "qty" => "required|integer",
        ]);
        $data = [
            'codeProduit' => $this->codePro,
            'nomProduit' => $this->nomPro,
            'prixUnitaire' => $this->priUnit,
            'catId' => $this->categorieid,
            'Quantite' => $this->qty
        ];
        if ($this->edition) {
            Produit::find($this->edition)->update($data);
        } else {
            Produit::create($data);
        }
        $this->resetFields();
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.stock', [
            'toutPro' => Produit::where(function ($query) {
                if ($this->search != "") {
                    $query->where('nomProduit', 'like', '%' . $this->search . '%')
                        ->orWhere('codeProduit', 'like', '%' . $this->search . '%');
                } else {
                    $query = Produit::all();
                }
            })->orderBy("id",'desc')->paginate(4),
            'stocks' => Ventes::where(function ($query) {
                if ($this->from != "" && $this->to != "") {
                    $query->whereBetween('created_at', [$this->from, $this->to]);
                } else {
                    $query = Ventes::all();
                }
            })->orderBy("id",'desc')->paginate(10)
        ]);
    }
}
