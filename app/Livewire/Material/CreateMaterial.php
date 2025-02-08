<?php

namespace App\Livewire\Material;

use App\Models\UUCC;
use App\Models\UUCCMaterial;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CreateMaterial extends ModalComponent
{
    public $codigo_material, $descripcion, $cantidad, $unidad, $uucc, $selectUnidad = [], $uuccOptions = [];

    protected $rules = [
        'codigo_material' => 'required|string|max:100',
        'descripcion'     => 'nullable|string|max:100',
        'cantidad'        => 'nullable|numeric|min:0|max:9999',
        'unidad'          => 'nullable|string|max:50',
        'uucc'            => 'nullable|integer',
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
        $this->validate();
        UUCCMaterial::create([
            'codigo_material' => $this->codigo_material,
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'unidad' => $this->unidad,
            'uucc' => $this->uucc
        ]);

        $this->dispatch('render')->to('Material.MaterialDatatable');
        Toaster::success('Material registrado existosamente');

        $this->closeModal();
    }
}
