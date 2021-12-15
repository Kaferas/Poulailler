<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Client extends Component
{
    public $noClient;
    public $preClient;
    public $adClient;
    public $telClient;
    public $cniClient;


    public function save()
    {
        $this->validate([
            'noClient' => "required|string",
            'preClient' => "required|string",
            'adClient' => "required|string",
            'telClient' => "required|string",
            'cniClient' => "required|string",
        ]);
    }
    public function render()
    {
        return view('livewire.client');
    }
}
