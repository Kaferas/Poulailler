<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use Livewire\Component;

class Depense extends Component
{
    public $nomDepense;
    public $edit = 0;
    public $etat="Depo";
    public $modif=0;
    protected $listeners = [
        'CategorieName',
        'matchDepense',
        'hereYourData'    
      ];
    public function matchDepense($name)
    {
        $this->edit=$name[0];
        $this->etat=$name[1];
        // dd($this->nomDepense);
    }
    
    public function hereYourData($data)
    {
        $this->modif=$data[0];
        $this->nomDepense=Depenses::find($data[0])->nomDepense;
    }

    public function CategorieName($one)
    {
        dd("Gooooooood");
        $this->edit = $one[0];
        $this->etat=$one[1];
        $found = Depenses::find($this->edit)->where("etat",$this->etat)->get();
        $this->nomDepense = $found->nomDepense;
    }

    public function save()
    {
        $this->validate([
            'nomDepense' => "required"
        ]);
        $data = [
            'nomDepense' => $this->nomDepense,
            'etat'=> $this->etat
        ];

        if ($this->modif) {
            Depenses::find($this->modif)->update($data);
        } else {
            Depenses::create($data);
        }
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.depense');
    }
}
