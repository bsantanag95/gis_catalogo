<?php

use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\CatalogoDetalleController;
use App\Http\Controllers\CatalogoUUCCController;
use App\Http\Controllers\CUDNController;
use App\Http\Controllers\UUCCController;
use App\Http\Controllers\UUCCMaterialController;
use App\Http\Controllers\UUCCServicioController;
use App\Models\CatalogoDetalle;
use App\Models\CatalogoUUCC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
// Route::get('/catalogo-uucc', [CatalogoUUCC::class, 'index'])->name('catalogouucc.index');
Route::get('/uucc', [UUCCController::class, 'index'])->name('uucc.index');
Route::get('/cudn', [CUDNController::class, 'index'])->name('cudn.index');
Route::get('/materiales', [UUCCMaterialController::class, 'index'])->name('material.index');
Route::get('/servicios', [UUCCServicioController::class, 'index'])->name('servicio.index');
Route::get('/detalle-catalogo', [CatalogoDetalleController::class, 'index'])->name('catalogo-detalle.index');
Route::get('/catalogo-uucc', [CatalogoUUCCController::class, 'index'])->name('catalogo-uucc.index');

Route::put('/editar/{id}', [CatalogoController::class, 'editar'])->name('ruta.editar');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
