<?php

namespace App\Livewire\Servicio;

use App\Models\UUCCServicio;
use LivewireUI\Modal\ModalComponent;

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

        session()->flash('message', 'El servicio ha sido actualizado correctamente.');
        $this->closeModal();
    }
}
