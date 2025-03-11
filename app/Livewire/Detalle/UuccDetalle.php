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
            'catalogoDetalle.material',  // Relación corregida
            'catalogoDetalle.servicio'
        ])->find($this->codigoUucc);

        $this->materiales = $uucc->catalogoDetalle
            ->pluck('material')
            ->unique('codigo_material')
            ->values()
            ->toArray();

        $this->servicios = $uucc->catalogoDetalle
            ->pluck('servicio')
            ->unique('codigo_servicio')
            ->values()
            ->toArray();

        if (!$uucc) {
            abort(404, "UUCC no encontrada");
        }
    }

    public function render()
    {
        return view('livewire.detalle.uucc-detalle');
    }
}
