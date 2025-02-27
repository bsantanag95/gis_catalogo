<?php

namespace App\Livewire\CatalogoUucc;

use App\Models\CatalogoUUCC;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CatalogoUuccDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;

    public function render()
    {
        $catalogouucc = CatalogoUUCC::with(['catalogo', 'uucc_column'])
            ->whereHas('catalogo') // Asegura que exista la relación catalogo
            ->whereHas('uucc_column') // Asegura que exista la relación uucc_column
            ->when($this->search, function ($query) {
                $query->whereHas('catalogo', function ($q) {
                    $q->where('codigo', 'like', '%' . $this->search . '%');
                })->orWhereHas('catalogo', function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%');
                })->orWhereHas('uucc_column', function ($q) {
                    $q->where('codigo_uucc', 'like', '%' . $this->search . '%');
                })->orWhereHas('uucc_column', function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->paginate($this->perPage);

        return view('livewire.catalogo-uucc.catalogo-uucc-datatable', compact('catalogouucc'));
    }

    public  function  update()
    {
        $currentPage = 1;
        Paginator::currentPageResolver(function () use ($currentPage) {
            return  $currentPage;
        });
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
}
