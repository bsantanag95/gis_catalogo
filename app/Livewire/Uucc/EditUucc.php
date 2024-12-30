<?php

namespace App\Livewire\Uucc;

use App\Models\UUCC;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditUucc extends ModalComponent
{
    public UUCC $uucc;

    protected $rules = [
        'uucc.codigo_uucc'    => 'required',
        'uucc.descripcion'    => 'nullable|string|max:100',
        'uucc.unidad'         => 'nullable|string|max:50',
        'uucc.duracion'       => 'nullable|string|max:50',
        'uucc.fase'           => 'nullable|integer',
        'uucc.norma'          => 'nullable|string|max:50',
        'uucc.clase_activo'   => 'nullable|string|max:50',
    ];

    public function mount($codigo_uucc)
    {
        $this->uucc = UUCC::where('codigo_uucc', $codigo_uucc)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.uucc.edit-uucc');
    }

    public function update()
    {
        $this->validate();
        $this->uucc->save();
        $this->dispatch('render')->to('Uucc.UuccDatatable');

        session()->flash('message', 'El UUCC ha sido actualizado correctamente.');
        $this->closeModal();
    }
}
