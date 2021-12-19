<?php

namespace App\Http\Livewire;

use App\Models\Clients;
use Livewire\Component;

class Client extends Component
{
    public $edition = null;
    public $idClient;
    public $noClient;
    public $preClient;
    public $adClient;
    public $telClient;
    public $cniClient;
    public $recherche = NULL;
    protected $listeners = [
        'seeMore',
        'see'
    ];

    public function see($id)
    {
        $this->idClient = $id;
        $this->edition = 1;
        $found = Clients::find($this->idClient);
        $this->noClient = $found->nomClient;
        $this->preClient = $found->prenomClient;
        $this->adClient = $found->adressClient;
        $this->telClient = $found->telClient;
        $this->cniClient = $found->cniClient;
    }
    public function seeMore($id)
    {
        $this->idClient = $id;
    }
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
        $data = [
            "nomClient" => $this->noClient,
            "prenomClient" => $this->preClient,
            "adressClient" => $this->adClient,
            "telClient" => $this->telClient,
            "cniClient" => $this->cniClient
        ];
        if ($this->idClient) {
            Clients::find($this->idClient)->update($data);
        } else {

            Clients::create($data);
        }
        return redirect(request()->header('Referer'))->with('message', "Client bien Enregistre");
    }
    public function render()
    {
        return view('livewire.client');
    }
}
