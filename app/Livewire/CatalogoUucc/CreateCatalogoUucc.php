<?php

namespace App\Livewire\CatalogoUucc;

use App\Models\Catalogo;
use App\Models\CatalogoUUCC;
use App\Models\UUCC;
use Exception;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CreateCatalogoUucc extends ModalComponent
{
    public $catalogoOptions = [], $uuccOptions = [];
    public $codigo_cat = "", $uucc = "", $cantidad;

    public function mount()
    {
        $this->catalogoOptions = Catalogo::all();
        $this->uuccOptions = UUCC::all();
    }

    public function render()
    {
        return view('livewire.catalogo-uucc.create-catalogo-uucc');
    }

    public function create()
    {
        try {
            $validatedData = $this->validate([
                'codigo_cat' => 'required|string',
                'uucc' => 'required|integer',
                'cantidad' => 'nullable|integer|min:0|max:9999'
            ]);

            CatalogoUUCC::create([
                'codigo_cat' => $validatedData['codigo_cat'],
                'uucc' => $validatedData['uucc'],
                'cantidad' => $validatedData['cantidad'] ?? 0,
            ]);

            $catalogo = Catalogo::find($validatedData['codigo_cat']);
            if ($catalogo) {
                $catalogo->cant_uucc += $this->cantidad;
                $catalogo->save();
            }

            $this->dispatch('render')->to('CatalogoUucc.CatalogoUuccDatatable');
            Toaster::success('Transacción registrada exitosamente');
            $this->closeModal();
        } catch (Exception $e) {
            Toaster::error('Ocurrió un error: ' . $e->getMessage());
        }
    }
}
