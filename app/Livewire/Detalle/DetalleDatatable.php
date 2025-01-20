<?php

namespace App\Livewire\Detalle;

use App\Models\CatalogoDetalle;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class DetalleDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;

    public function render()
    {
        $detalle = CatalogoDetalle::with(['catalogo', 'uucc', 'material', 'servicio'])
            // ->where(function ($query) {
            //     $query->where('codigo_cat', 'like', '%' . $this->search . '%')
            //         ->orWhere('codigo_uucc', 'like', '%' . $this->search . '%')
            //         ->orWhere('codigo_material', 'like', '%' . $this->search . '%')
            //         ->orWhere('codigo_servicio', 'like', '%' . $this->search . '%');
            // })
            ->when($this->search, function ($query) {
                $query->whereHas('catalogo', function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%');
                })->orWhereHas('uucc', function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%');
                })->orWhereHas('material', function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%');
                })->orWhereHas('servicio', function ($q) {
                    $q->where('descripcion', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->paginate($this->perPage);

        return view('livewire.detalle.detalle-datatable', compact('detalle'));
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
