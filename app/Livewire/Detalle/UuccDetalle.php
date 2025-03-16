<?php

namespace App\Livewire\Detalle;

use LivewireUI\Modal\ModalComponent;
use App\Models\UUCC;

class UuccDetalle extends ModalComponent
{
    public $codigoUucc;
    public $materiales = [];
    public $servicios = [];

    public function mount($codigoUucc)
    {
        $this->codigoUucc = $codigoUucc;
        $this->loadData();
    }

    public function loadData()
    {
        $uucc = UUCC::with([
            'catalogoDetalle.material',
            'catalogoDetalle.servicio'
        ])->find($this->codigoUucc);

        if (!$uucc) {
            abort(404, "UUCC no encontrada");
        }

        $this->materiales = optional($uucc->catalogoDetalle)
            ->pluck('material')
            ->filter()
            ->unique('codigo_material')
            ->values()
            ->toArray();

        $this->servicios = optional($uucc->catalogoDetalle)
            ->pluck('servicio')
            ->filter()
            ->unique('codigo_servicio')
            ->values()
            ->toArray();
    }


    public function render()
    {
        return view('livewire.detalle.uucc-detalle');
    }
}
