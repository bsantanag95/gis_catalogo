<?php

namespace App\Livewire\Detalle;

use App\Models\CatalogoDetalle;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class DetalleDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;

    protected $listeners = ['render' => 'render', 'delete'];

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

    public function delete($id)
    {
        try {
            $detalle = CatalogoDetalle::where('id', $id)->first();

            $detalle->delete();
            Toaster::success('El servicio fue eliminado exitosamente');
        } catch (Exception $e) {
            Toaster::error('Error: No se pudo eliminar el registro');
        }
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
