<?php

namespace App\Livewire\Material;

use App\Models\UUCC;
use App\Models\UUCCMaterial;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditMaterial extends ModalComponent
{
    public UUCCMaterial $material;
    public $uuccOptions = [], $selectUnidad = [];

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
        $this->selectUnidad = ['Jg', 'KG', 'M', 'Pz', 'ROL', 'TR'];
        $this->uuccOptions = UUCC::all();
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
        Toaster::success('Material actualizado existosamente');

        $this->closeModal();
    }
}
