<?php

namespace App\Livewire\CatalogoUucc;

use App\Models\Catalogo;
use App\Models\CatalogoUUCC;
use App\Models\UUCC;
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
        $validatedData = $this->validate([
            'codigo_cat' => 'required|string',
            'uucc' => 'required|integer',
            'cantidad' => 'nullable|integer|min:0'
        ]);

        CatalogoUUCC::create([
            'codigo_cat' => $validatedData['codigo_cat'],
            'uucc' => $validatedData['uucc'],
            'cantidad' => $validatedData['cantidad'] ?? null,
        ]);

        //$this->dispatch('render')->to('Material.MaterialDatatable');
        Toaster::success('Transacción registrada existosamente');

        $this->closeModal();
    }
}
