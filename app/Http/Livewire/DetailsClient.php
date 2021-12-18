<?php

namespace App\Http\Livewire;

use App\Models\Clients;
use Livewire\Component;

class DetailsClient extends Component
{
    public $search;
    public $clId;

    public function disable($id)
    {
        $this->clId = $id;
        // dd($this->clId);
        Clients::find($this->clId)->update([
            'etat' => 0
        ]);
    }

    public function render()
    {

        return view('livewire.details-client', [
            'allClients' => Clients::where(function ($query) {
                if ($this->search != "") {
                    $query->where("nomClient", 'like', '%' . $this->search . '%')
                        ->orWhere("prenomClient", 'like', '%' . $this->search . '%');
                } else {
                    $query = Clients::all();
                }
            })->paginate(3),
        ]);
    }
}
