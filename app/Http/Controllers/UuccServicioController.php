<?php

namespace App\Http\Controllers;

use App\Models\UUCCServicio;
use Illuminate\Http\Request;

class UuccServicioController extends Controller
{
    protected $listeners = ['destroy'];

    public function index()
    {
        return view('servicio.index');
    }

    public function destroy(UUCCServicio $servicio)
    {
        $servicio->delete();
    }
}
