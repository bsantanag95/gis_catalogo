<?php

namespace App\Livewire\Material;

use App\Models\UUCCMaterial;
use LivewireUI\Modal\ModalComponent;

class EditMaterial extends ModalComponent
{
    public UUCCMaterial $material;

    protected $rules = [
        'material.codigo_material' => 'required',
        'material.descripcion'     => 'nullable|string|max:100',
        'material.cantidad'        => 'nullable|numeric|min:0|max:999999999999.99999',
        'material.unidad'          => 'nullable|string|max:50',
        'material.uucc'            => 'nullable|integer',
    ];

    public function mount($codigo_material)
    {
        $this->material = UUCCMaterial::where('codigo_material', $codigo_material)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.material.edit-material');
    }

    public function update()
    {
        $this->validate();
        $this->material->save();
        $this->dispatch('render')->to('Material.MaterialDatatable');

        session()->flash('message', 'El material ha sido actualizado correctamente.');
        $this->closeModal();
    }
}
