<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use LivewireUI\Modal\ModalComponent;

class EditCatalogo extends ModalComponent
{
    public Catalogo $catalogo;
    public $objetoEOOptions = [];
    public $tipoCatalogoOptions = [];
    public $estado;

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


    public function mount($codigo)
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
        $this->catalogo = Catalogo::where('codigo', $codigo)->firstOrFail();
        $this->estado = $this->catalogo->estado;
        $this->updateTipoCatalogoOptions($this->catalogo->objeto_eo);
    }

    public function updatedCatalogoObjetoEo($value)
    {
        $this->updateTipoCatalogoOptions($value);
    }

    private function updateTipoCatalogoOptions($objetoEO)
    {
        $getTipoByObjeto = [
            'Accurate Route' => ['CANALIZACION SUBTERRANEA'],
            'Assembled equipment' => ['Conector Monopolar Separable Sub', 'Protección BT Subterránea'],
            'Cable Segment' => ['TRAMO SUBTERRÁNEO'],
            'Connector point' => ['PUNTO DE UNIÓN'],
            'Cross Arm' => ['ESTRUCTURA BT DE DERIVACIÓN', 'ESTRUCTURA BT DE LÍMITE DE ZONA', 'ESTRUCTURA BT DE PASO', 'ESTRUCTURA BT DE REMATE INTERMEDIO', 'ESTRUCTURA BT DE REMATE TERMINAL', 'ESTRUCTURA DE SED AÉREA', 'ESTRUCTURA MT DE DERIVACIÓN', 'ESTRUCTURA MT DE PASO', 'ESTRUCTURA MT DE REMATE', 'ESTRUCTURA MT DE REMATE INTERMEDIO'],
            'ETD Trafo' => ['TRANSFORMADOR AÉREO', 'TRANSFORMADOR DE SUPERFICIE'],
            'Ground' => ['PARARRAYOS', 'TIERRA DE PROTECCIÓN', 'TIERRA DE SERVICIO'],
            'Guy' => ['TIRANTE A PISO', 'TIRANTE A POSTE MOZO', 'TIRANTE A RIEL'],
            'Isolation Equipment' => ['DESCONECTADOR AÉREO MT', 'PROTECCIÓN BT AÉREA', 'RECONECTADOR'],
            'Line Segment' => ['TRAMO AÉREO'],
            'Meter' => ['COMPACTO DE MEDIDA'],
            'Pole' => ['POSTE'],
        ];

        $this->tipoCatalogoOptions = $getTipoByObjeto[$objetoEO] ?? [];

        if (!in_array($this->catalogo->tipo_catalogo, $this->tipoCatalogoOptions)) {
            $this->catalogo->tipo_catalogo = null;
        }
    }

    public function render()
    {
        return view('livewire.catalogo.edit-catalogo');
    }

    public function update()
    {
        $this->validate();
        $this->catalogo->estado = $this->estado;
        $this->catalogo->save();
        $this->dispatch('render')->to('Catalogo.CatalogoDatatable');

        session()->flash('message', 'El catálogo ha sido actualizado correctamente.');
        $this->closeModal();
    }
}
