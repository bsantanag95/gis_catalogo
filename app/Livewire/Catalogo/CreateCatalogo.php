<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;


class CreateCatalogo extends ModalComponent
{
    public $objetoEOOptions = [];

    public $codigo, $descripcion, $tipo_catalogo, $objeto_eo = '', $fases, $tension, $tipo, $cudn, $detalle_fase, $cant_uucc, $estado = 1;

    protected $rules = [
        'catalogo.codigo' => 'required',
        'catalogo.descripcion' => 'nullable|string|max:100',
        'catalogo.tipo_catalogo' => 'nullable|string|max:50',
        'catalogo.objeto_eo' => 'nullable|string|max:50',
        'catalogo.fases' => 'nullable|integer|min:0',
        'catalogo.tension' => 'nullable|string|max:50',
        'catalogo.tipo' => 'nullable|string|max:50',
        'catalogo.cudn' => 'nullable|string|max:50',
        'catalogo.detalle_fase' => 'nullable|string|max:50',
        'catalogo.cant_uucc' => 'nullable|integer|min:0',
        'catalogo.estado' => 'nullable|integer|min:0|max:1',
    ];

    public function mount()
    {
        $this->objetoEOOptions = [
            'Accurate Route',
            'Assembled equipment',
            'Cable Segment',
            'Connector point',
            'Cross Arm',
            'ETD Trafo',
            'Ground',
            'Guy',
            'Isolation Equipment',
            'Line Segment',
            'Meter',
            'Pole',
        ];
    }

    public function render()
    {
        return view('livewire.catalogo.create-catalogo');
    }

    public function create()
    {
        Catalogo::create($this->only('codigo', 'descripcion', 'tipo_catalogo', 'objeto_eo', 'fases', 'tension', 'tipo', 'cudn', 'detalle_fase', 'cant_uucc', 'estado'));
        $this->dispatch('render')->to('Catalogo.CatalogoDatatable');

        //$this->dispatch('success', 'Catalogo creado existosamente');
        Toaster::success('Catalogo creado existosamente');

        $this->closeModal();
    }
}
