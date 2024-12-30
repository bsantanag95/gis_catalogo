<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CUDNController extends Controller
{
    public function index()
    {
        return view('cudn.index');
    }
}
