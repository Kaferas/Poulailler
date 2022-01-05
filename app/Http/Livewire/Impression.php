<?php

namespace App\Http\Livewire;

use App\Models\Clients;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Impression extends Component
{
    use WithPagination;

    public $table = "clients";
    public $client;
    public $clients;
    public $du;
    public $au;
    protected $paginationTheme = "bootstrap";
    // public $etat;

    public function mount()
    {
        $this->clients = Clients::all();
    }

    public function render()
    {
        return view('livewire.impression', [
            'data' => DB::table($this->table)->where(function ($query) {
                if ($this->table == "depenses") {
                    if ($this->du && $this->au) {
                        $query->whereBetween("created_at", [$this->du, $this->au]);
                    }
                }
                if ($this->table == "ventes") {
                    if ($this->client) {
                        $query->where("ClientId", "=", $this->client);
                        if ($this->du && $this->au) {
                            $query->whereBetween("created_at", [$this->du, $this->au]);
                        }
                    }
                }
            })->orderBy("id", "DESC")->get()
        ]);
    }
}
