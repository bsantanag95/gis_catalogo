<?php

namespace App\Livewire\Uucc;

use App\Models\UUCC;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CreateUucc extends ModalComponent
{
    public $codigo_uucc, $descripcion, $unidad, $duracion, $fase, $norma, $clase_activo, $selectUnidad = [];

    protected $rules = [
        'codigo_uucc'    => 'required|integer|min:0|unique:GIS_CAT_UUCC,codigo_uucc',
        'descripcion'    => 'nullable|string|max:100',
        'unidad'         => 'nullable|string|max:50',
        'duracion'       => 'nullable|string|max:50',
        'fase'           => 'nullable|integer',
        'norma'          => 'nullable|string|max:50',
        'clase_activo'   => 'nullable|string|max:50',
    ];

    public function mount()
    {
        $this->selectUnidad = ['C/U', 'CU', 'JGO', 'M', 'MT'];
    }

    public function render()
    {
        return view('livewire.uucc.create-uucc');
    }

    public function create()
    {
        $this->validate();
        UUCC::create($this->only('codigo_uucc', 'descripcion', 'unidad', 'duracion', 'fase', 'norma', 'clase_activo'));
        $this->dispatch('render')->to('Uucc.UuccDatatable');
        Toaster::success('UUCC registrado existosamente');
        $this->closeModal();
    }
}
