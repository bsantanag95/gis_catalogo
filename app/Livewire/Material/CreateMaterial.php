<?php

namespace App\Livewire\Material;

use App\Models\UUCC;
use App\Models\UUCCMaterial;
use LivewireUI\Modal\ModalComponent;

class CreateMaterial extends ModalComponent
{
    public $codigo_material, $descripcion, $cantidad, $unidad, $uucc, $selectUnidad = [], $uuccOptions = [];

    protected $rules = [
        'material.codigo_material' => 'required',
        'material.descripcion'     => 'nullable|string|max:100',
        'material.cantidad'        => 'nullable|numeric|min:0|max:999999999999.99999',
        'material.unidad'          => 'nullable|string|max:50',
        'material.uucc'            => 'nullable|integer',
    ];

    public function mount()
    {
        $this->selectUnidad = ['Jg', 'KG', 'M', 'Pz', 'ROL', 'TR'];
        $this->uuccOptions = UUCC::all();
    }
    public function render()
    {
        return view('livewire.material.create-material');
    }

    public function create()
    {
        UUCCMaterial::create([
            'codigo_material' => $this->codigo_material,
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'unidad' => $this->unidad,
            'uucc' => $this->uucc
        ]);

        $this->dispatch('render')->to('Material.MaterialDatatable');

        session()->flash('message', 'El material fue creado correctamente.');
        $this->closeModal();
    }
}
