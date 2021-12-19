<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class FabricationController extends Controller
{
    public function index()
    {
        return view("fabrication.index", [
            'now' => "fabrication",
            'clients' => Clients::all()
        ]);
    }
}
