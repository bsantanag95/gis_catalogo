<?php

namespace App\Livewire\Uucc;

use App\Models\UUCC;
use Illuminate\Validation\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditUucc extends ModalComponent
{
    public UUCC $uucc;
    public $selectUnidad = [];
    public $originalCodigo;

    protected function rules()
    {
        return [
            'uucc.codigo_uucc' => [
                'required',
                'integer',
                Rule::unique('GIS_CAT_UUCC', 'codigo_uucc')
                    ->ignore($this->originalCodigo, 'codigo_uucc')
            ],
            'uucc.descripcion'    => 'nullable|string|max:100',
            'uucc.unidad'         => 'nullable|string|max:50',
            'uucc.duracion'       => 'nullable|string|max:50',
            'uucc.fase'           => 'nullable|integer',
            'uucc.norma'          => 'nullable|string|max:50',
            'uucc.clase_activo'   => 'nullable|string|max:50',
        ];
    }
    public function mount($codigo_uucc)
    {
        $this->originalCodigo = $codigo_uucc;
        $this->uucc = UUCC::where('codigo_uucc', $codigo_uucc)->firstOrFail();
        $this->selectUnidad = ['C/U', 'CU', 'JGO', 'M', 'MT'];
    }

    public function render()
    {
        return view('livewire.uucc.edit-uucc');
    }

    public function update()
    {
        try {
            $this->validate();
            $uucc = UUCC::where('codigo_uucc', $this->originalCodigo)->firstOrFail();
            $uucc->fill($this->uucc->getAttributes());
            $this->uucc->save();
            $this->dispatch('render')->to('Uucc.UuccDatatable');
            Toaster::success('UUCC actualizado existosamente');

            $this->closeModal();
        } catch (\Exception $e) {
            Toaster::error('Ocurrió un error: ' . $e->getMessage());
        }
    }
}
