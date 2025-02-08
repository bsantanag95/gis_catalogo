<?php

namespace App\Livewire\Servicio;

use LivewireUI\Modal\ModalComponent;
use App\Models\UUCCServicio;
use Masmerise\Toaster\Toaster;

class CreateServicio extends ModalComponent
{
    public UUCCServicio $servicio;
    public $codigo_servicio, $descripcion;

    public $rules = [
        'codigo_servicio' => 'required|integer',
        'descripcion' => 'required|string|max:100',
    ];

    public function render()
    {
        return view('livewire.servicio.create-servicio');
    }

    public function create()
    {
        $this->validate();
        UUCCServicio::create([
            'codigo_servicio' => $this->codigo_servicio,
            'descripcion' => $this->descripcion
        ]);

        $this->dispatch('render')->to('Servicio.ServicioDatatable');
        Toaster::success('Servicio registrado existosamente');

        $this->closeModal();
    }
}
