<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCatalogo extends ModalComponent
{
    public Catalogo $catalogo;

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
        $this->catalogo = Catalogo::where('codigo', $codigo)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.catalogo.edit-catalogo');
    }

    public function update()
    {
        $this->validate();
        $this->catalogo->save();
        $this->dispatch('render')->to('Catalogo.CatalogoDatatable');

        session()->flash('message', 'El catálogo ha sido actualizado correctamente.');
        $this->closeModal();
    }
}
