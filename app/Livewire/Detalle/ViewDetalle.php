<?php

namespace App\Livewire\Detalle;

use App\Models\Catalogo;
use App\Models\UUCC;
use LivewireUI\Modal\ModalComponent;

class ViewDetalle extends ModalComponent
{
    public $codigoCat, $materiales, $servicios;
    public $uuccDetalle = [];

    public function mount($codigoCat)
    {
        $catalogo = Catalogo::with([
            'detalle.uucc',
            'detalle.material',
            'detalle.servicio'
        ])->where('codigo', $codigoCat)->first();

        $this->uuccDetalle = $catalogo->detalle
            ->pluck('uucc')
            ->filter()
            ->unique('codigo_uucc')
            ->values();

        $this->materiales = $catalogo->detalle
            ->pluck('material')
            ->filter()
            ->unique('codigo_material')
            ->values();

        $this->servicios = $catalogo->detalle
            ->pluck('servicio')
            ->filter()
            ->unique('codigo_servicio')
            ->values();
    }

    public function render()
    {
        return view('livewire.detalle.view-detalle');
    }
}
