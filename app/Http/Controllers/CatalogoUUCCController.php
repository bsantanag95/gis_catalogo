<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoUUCCController extends Controller
{
    public function index()
    {
        return view('catalogo-uucc.index');
    }
}
