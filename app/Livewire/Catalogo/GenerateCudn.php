<?php

namespace App\Livewire\Catalogo;

use App\Models\Cudn;
use LivewireUI\Modal\ModalComponent;

class GenerateCudn extends ModalComponent
{
    public $selectedGroup = '';
    public $groups = [];

    public function mount()
    {
        $this->groups = Cudn::select('grupo')
            ->groupBy('grupo')
            ->orderBy('grupo')
            ->get()
            ->pluck('grupo');
    }

    public function selectGroup()
    {
        if ($this->selectedGroup) {
            $this->dispatch('cudnSelected', $this->selectedGroup);
            $this->closeModal();
        }
    }

    public function render()
    {
        return view('livewire.catalogo.generate-cudn');
    }
}
