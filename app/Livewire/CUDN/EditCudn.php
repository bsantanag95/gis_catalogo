<?php

namespace App\Livewire\Cudn;

use App\Models\CUDN;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCudn extends ModalComponent
{
    public CUDN $cudn;

    protected $rules = [
        'cudn.grupo' => 'nullable|string|max:50',
        'cudn.correlativo' => 'nullable|integer|min:0',
        'cudn.item' => 'nullable|string|max:50',
        'cudn.sigla' => 'nullable|string|max:10',
        'cudn.detalle' => 'nullable|string|max:100',
        'cudn.tipo' => 'nullable|string|max:10',
    ];


    public function mount($codigo)
    {
        $this->cudn = CUDN::where('codigo', $codigo)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.cudn.edit-cudn');
    }

    public function update()
    {
        $this->validate();
        $this->cudn->save();
        $this->dispatch('render')->to('Cudn.CudnDatatable');

        session()->flash('message', 'El CUDN ha sido actualizado correctamente.');
        $this->closeModal();
    }
}
