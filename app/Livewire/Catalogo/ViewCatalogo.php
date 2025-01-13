<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use LivewireUI\Modal\ModalComponent;

class ViewCatalogo extends ModalComponent
{
    public $catalogo = [];
    public $codigo;

    public function mount($codigo)
    {
        $catalogo = Catalogo::where('codigo', $codigo)->firstOrFail();
        $this->catalogo = $catalogo->toArray();
    }

    public function render()
    {
        return view('livewire.catalogo.view-catalogo');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
