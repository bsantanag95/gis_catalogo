<?php

namespace App\Livewire\Uucc;

use App\Models\UUCC;
use LivewireUI\Modal\ModalComponent;

class CreateUucc extends ModalComponent
{
    public $codigo_uucc, $descripcion, $unidad, $duracion, $fase, $norma, $clase_activo;

    protected $rules = [
        'uucc.codigo_uucc'    => 'required',
        'uucc.descripcion'    => 'nullable|string|max:100',
        'uucc.unidad'         => 'nullable|string|max:50',
        'uucc.duracion'       => 'nullable|string|max:50',
        'uucc.fase'           => 'nullable|integer',
        'uucc.norma'          => 'nullable|string|max:50',
        'uucc.clase_activo'   => 'nullable|string|max:50',
    ];

    public function render()
    {
        return view('livewire.uucc.create-uucc');
    }

    public function create()
    {
        UUCC::create($this->only('codigo_uucc', 'descripcion', 'unidad', 'duracion', 'fase', 'norma', 'clase_activo'));
        $this->dispatch('render')->to('Uucc.UuccDatatable');

        session()->flash('message', 'El UUCC fue creado correctamente.');
        $this->closeModal();
    }
}
