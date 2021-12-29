<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use Livewire\Component;

class Depense extends Component
{
    public $nomDepense;
    public $edit = 0;
    protected $listeners = [
        'CategorieName'
    ];

    public function CategorieName($one)
    {
        $this->edit = $one;
        $found = Depenses::find($this->edit);
        $this->nomDepense = $found->nomDepense;
    }

    public function save()
    {
        $this->validate([
            'nomDepense' => "required"
        ]);
        $data = [
            'nomDepense' => $this->nomDepense
        ];

        if ($this->edit) {
            Depenses::find($this->edit)->update($data);
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
