<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use App\Models\Depenses;
use App\Models\Operations;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;

class Operation extends Component
{

    use WithPagination;
    public $depenseForm = 0;
    public $depenses;
    public $depense;
    public $motif;
    public $dernier;
    public $modif = 0;
    public  $montant;
    public $allinOne = 0;
    public $specif = 'recette';
    public $etat;
    public $nomDemandeur;

    public function changeModif($identite)
    {
        $this->modif = $identite;
        $found = Operations::find($identite);
        $this->motif = $found->motif;
        $this->montant = $found->montant;
        $this->depense = $found->depenseId;
        $this->specif = $found->motif;
        $this->nomDemandeur = $found->nomDemandeur;
    }
    public function mount()
    {
        $this->depenses = Depenses::where("etat",'recette')->get();
    }
    public function changement()
    {
        $this->depenses = Depenses::where('etat',$this->specif)->get();
    }
    public function dernierOperation()
    {
        $this->dernier = 1;
        $this->depenseForm = null;
        $this->allinOne = null;
    }
    public function allCategories()
    {
        $this->dernier = null;
        $this->depenseForm = null;
        $this->allinOne = 1;
    }

    public function adddepense()
    {
        $this->depenseForm = 1;
        $this->dernier = null;
        $this->allinOne = null;
    }

    public function save()
    {
        $this->validate([
            'nomDemandeur'=>"string",
            'motif' => "string",
            'depense' => "required|integer",
            'montant' => "required|integer"
        ]);
        $data = [
            'nomDemandeur'=>$this->nomDemandeur,
            'motif' => $this->motif,
            'montant' => $this->montant,
            'depenseId' => $this->depense,
        ];
        if ($this->modif) {
            Operations::find($this->modif)->update($data);
            $this->modif = 0;
        } else {

            Operations::create($data);
        }
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.operation', [
            'derniers' => Operations::paginate(5),
            'allDepenses' => Depenses::orderBy('id',"asc")->paginate(5)
        ]);
    }
}
