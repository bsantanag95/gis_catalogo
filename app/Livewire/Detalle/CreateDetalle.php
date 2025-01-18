<?php

namespace App\Livewire\Detalle;

use App\Models\Catalogo;
use App\Models\CatalogoDetalle;
use App\Models\UUCC;
use App\Models\UUCCMaterial;
use App\Models\UUCCServicio;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class CreateDetalle extends ModalComponent
{
    public $catalogoOptions = [], $uuccOptions = [], $materialOptions = [], $servicioOptions = [];
    public $codigo_cat = "", $codigo_uucc = "", $codigo_material = "", $codigo_servicio = "";

    public function mount()
    {
        $this->catalogoOptions = Catalogo::all();
        $this->uuccOptions = UUCC::all();
        $this->materialOptions = UUCCMaterial::all();
        $this->servicioOptions = UUCCServicio::all();
    }

    public function render()
    {
        return view('livewire.detalle.create-detalle');
    }

    public function create()
    {
        $validate = $this->validate([
            'codigo_cat' => 'required|integer',
            'codigo_uucc' => 'required|integer',
            'codigo_material' => 'required|integer',
            'codigo_servicio' => 'required|integer',
        ]);

        CatalogoDetalle::create($validate);

        //$this->dispatch('render')->to('Material.MaterialDatatable');
        Toaster::success('Transacción registrada existosamente');

        $this->closeModal();
    }
}
