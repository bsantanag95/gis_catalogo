<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoDetalleController extends Controller
{
    public function index()
    {
        return view('catalogo-detalle.index');
    }
}
