<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpressionController extends Controller
{
    public function index()
    {
        return view("impression.index",[
            'now' => "impression"
        ]);
    }
}
