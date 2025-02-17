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
            'descripcion' => $this->descripcion
        ]);

        $this->dispatch('render')->to('Servicio.ServicioDatatable');
        Toaster::success('Servicio registrado existosamente');

        $this->closeModal();
    }
}
