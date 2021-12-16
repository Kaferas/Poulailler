<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuivisController extends Controller
{
    public function index()
    {
        return view("suivis.index", [
            'now' => "suivis"
        ]);
    }
}
