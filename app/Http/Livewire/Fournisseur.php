<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fournisseurs;

class Fournisseur extends Component
{
    public $nomFourni;
    public $contFourni;
    public $adressFourni;
    public $PhoneFourni;
    public $cniFourni;
    public $fournisseurs;

    public function save()
    {
        $this->validate([
            'nomFourni' => "string|required",
            'contFourni' => "string|required",
            'adressFourni' => "string|required",
            'PhoneFourni' => "string|required",
            'cniFourni' => "string|required",
        ]);
        Fournisseurs::create([
            'name' => $this->nomFourni,
            'prenom' => $this->contFourni,
            'adress' => $this->adressFourni,
            'phone' => $this->PhoneFourni,
            'cni' => $this->cniFourni
        ]);
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.fournisseur');
    }
}
