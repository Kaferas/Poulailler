<?php

namespace App\Http\Livewire;

use App\Models\Clients;
use Livewire\Component;

class Client extends Component
{
    public $noClient;
    public $preClient;
    public $adClient;
    public $telClient;
    public $cniClient;
    public $recherche = NULL;
   
    public function fermerSearch()
    {
        $this->recherche = null;
    }
    public function changeSearch()
    {
        $this->recherche = 1;
    }
    public function save()
    {
        $this->validate([
            'noClient' => "required|string",
            'preClient' => "required|string",
            'adClient' => "required|string",
            'telClient' => "required|string",
            'cniClient' => "required|string",
        ]);
        Clients::create([
            "nomClient" => $this->noClient,
            "prenomClient" => $this->preClient,
            "adressClient" => $this->adClient,
            "telClient" => $this->telClient,
            "cniClient" => $this->cniClient
        ]);
        return redirect(request()->header('Referer'))->with('message', "Client bien Enregistre");
    }
    public function render()
    {
        return view('livewire.client');
    }
}
