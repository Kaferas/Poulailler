<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Clients;
use App\Models\detail_devis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FabricationController extends Controller
{
    public $commandeCode;

    public function __construct()
    {
        if (Gate::allows("is-caissier")) {
            return abort(403);
        }
    }
    public function index()
    {
        return view("fabrication.index", [
            'now' => "fabrication",
            'clients' => Clients::all(),
            'commande' => Devis::where('etat', 0)->get()
        ]);
    }
    public function store(Request $request)
    {
        $this->codes = Devis::select("codeDevis")->get()->toArray();
        do {
            $this->commandeCode = rand(184440, 93249495969);
        } while (in_array($this->commandeCode, $this->codes));
        $this->validate($request, [
            'clientId' => "required",
            'nameDev' => "required|string",
        ]);
        DB::transaction(function () use ($request) {
            $devis = new Devis;
            $devis->nom_devis = $request->nameDev;
            $devis->codeDevis = $this->commandeCode;
            $devis->quantite = $request->clientId;
            $devis->save();
            $dId = $devis->id;

            for ($i = 0; $i < count($request->commande); $i++) {
                detail_devis::create([
                    'nomMateriel' => $request->commande[$i],
                    'montantMateriel' => $request->montant[$i],
                    'devisId' => $dId
                ]);
            }
        });
        return redirect()->back()->with("message", "Commande Fait");
    }

    public function details($id)
    {
        $summary = detail_devis::where('devisId', $id)->get();
        return view("fabrication.details-devis", [
            'details' => $summary,
            'now' => 'fabrication'
        ]);
    }
    public function finaliser($id)
    {
        Devis::find($id)->update(['etat' => 1]);
        return redirect()->back()->with("message", "Cloture de la fabrication");
    }
}
