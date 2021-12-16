<?php

namespace App\Http\Livewire;

use App\Models\Clients;
use App\Models\Ventes;
use Livewire\Component;

class DetailsVente extends Component
{
    public $idClient = 0;
    public $acheteur;
    public $details = [];
    protected $listeners = [
        'seeMore'
    ];

    public function seeMore($chooseId)
    {
        $this->idClient = $chooseId;
        $this->acheteur = Clients::find($this->idClient);
        $this->details = Ventes::where('ClientId', $this->idClient)->get();
    }

    public function render()
    {
        return view('livewire.details-vente');
    }
}
