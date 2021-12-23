<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuivisController extends Controller
{

    public function index()
    {
        if (Gate::allows("is-admin")) {

            return view("suivis.index", [
                'now' => "suivis"
            ]);
        } else {
            abort(403);
        }
    }
}
