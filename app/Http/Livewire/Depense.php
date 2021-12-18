<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use Livewire\Component;

class Depense extends Component
{
    public $nomDepense;

    public function save()
    {
        $this->validate([
            'nomDepense' => "required"
        ]);
        Depenses::create([
            'nomDepense' => $this->nomDepense
        ]);
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.depense');
    }
}
