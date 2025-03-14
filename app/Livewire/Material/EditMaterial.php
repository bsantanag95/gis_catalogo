<?php

namespace App\Livewire\Material;

use App\Models\UUCC;
use App\Models\UUCCMaterial;
use Exception;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditMaterial extends ModalComponent
{
    public UUCCMaterial $material;
    public $uuccOptions = [], $selectUnidad = [], $originalCodigo;

    protected function rules()
    {
        return
            [
                'material.codigo_material' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('GIS_CAT_UUCC_MATERIAL', 'codigo_material')
                        ->ignore($this->originalCodigo, 'codigo_material')
                ],
                'material.descripcion'     => 'nullable|string|max:100',
                'material.cantidad'        => 'nullable|numeric|min:0|max:9999',
                'material.unidad'          => 'nullable|string|max:50',
                'material.uucc'            => 'nullable|integer',
            ];
    }

    public function mount($codigo_material)
    {
        $this->originalCodigo = $codigo_material;
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
        try {
            $this->validate();

            $material = UUCCMaterial::where('codigo_material', $this->originalCodigo)->firstOrFail();
            $material->fill($this->material->getAttributes());

            $this->material->save();
            $this->dispatch('render')->to('Material.MaterialDatatable');
            Toaster::success('Material actualizado existosamente');

            $this->closeModal();
        } catch (Exception $e) {
            Toaster::error('Ocurrió un error: ' . $e->getMessage());
        }
    }
}
