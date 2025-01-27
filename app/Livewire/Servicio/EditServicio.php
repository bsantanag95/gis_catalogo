<?php

namespace App\Livewire\Servicio;

use App\Models\UUCCServicio;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditServicio extends ModalComponent
{
    public UUCCServicio $servicio;

    public $rules = [
        'servicio.codigo_servicio' => 'required',
        'servicio.descripcion' => 'nullable|string|max:100',
    ];

    public function mount($codigo_servicio)
    {
        $this->servicio = UUCCServicio::where('codigo_servicio', $codigo_servicio)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.servicio.edit-servicio');
    }

    public function update()
    {
        $this->validate();
        $this->servicio->save();
        $this->dispatch('render')->to('Servicio.ServicioDatatable');
        Toaster::success('Servicio actualizado existosamente');

        $this->closeModal();
    }
}
