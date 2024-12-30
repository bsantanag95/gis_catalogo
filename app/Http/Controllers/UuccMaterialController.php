<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UuccMaterialController extends Controller
{
    public function index()
    {
        return view('material.index');
    }
}
