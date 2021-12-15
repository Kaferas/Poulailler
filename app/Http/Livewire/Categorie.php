<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories;

class Categorie extends Component
{
    public $catName;
    public function save()
    {
        $this->validate(
            ['catName' => "string|required"]
        );
        Categories::create([
            'nameCat' => $this->catName
        ]);
        return redirect(request()->header('Referer'));
    }
    public function resetInput()
    {
        $this->catName = "";
    }
    public function render()
    {
        return view('livewire.categorie');
    }
}
