<?php

namespace App\Livewire\Detalle;

use App\Models\Catalogo;
use App\Models\CatalogoDetalle;
use App\Models\UUCC;
use App\Models\UUCCMaterial;
use App\Models\UUCCServicio;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditDetalle extends ModalComponent
{
    public CatalogoDetalle $detalle;
    public $catalogoOptions = [], $uuccOptions = [], $materialOptions = [], $servicioOptions = [];

    protected $rules = [
        'detalle.codigo_cat' => 'required|string',
        'detalle.codigo_uucc' => 'required|integer',
        'detalle.codigo_material' => 'required|string',
        'detalle.codigo_servicio' => 'required|integer',
    ];

    public function mount($id)
    {
        $this->detalle = CatalogoDetalle::where('id', $id)->firstOrFail();

        $this->catalogoOptions = Catalogo::all();
        $this->uuccOptions = UUCC::all();
        $this->materialOptions = UUCCMaterial::all();
        $this->servicioOptions = UUCCServicio::all();
    }

    public function render()
    {
        return view('livewire.detalle.edit-detalle');
    }

    public function update()
    {
        $this->validate();

        $this->detalle->update();

        $this->dispatch('render')->to('Detalle.DetalleDatatable');
        Toaster::success('Detalle actualizado existosamente');

        $this->closeModal();
    }
}
