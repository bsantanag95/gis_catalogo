<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class CatalogoDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;
    public $openModal = false;
    public $catalogoSelected = [];

    protected $listeners = ['render' => 'render', 'delete'];

    public function mount()
    {
        //
    }

    public function render()
    {
        $catalogos = Catalogo::where(function ($query) {
            $query->where('codigo', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                ->orWhere('tipo_catalogo', 'like', '%' . $this->search . '%')
                ->orWhere('objeto_eo', 'like', '%' . $this->search . '%')
                ->orWhere('tension', 'like', '%' . $this->search . '%')
                ->orWhere('tipo', 'like', '%' . $this->search . '%')
                ->orWhere('cudn', 'like', '%' . $this->search . '%');
        })->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })->paginate($this->perPage);
        return view('livewire.catalogo.catalogo-datatable', compact('catalogos'));
    }

    public function viewCatalogo($codigo)
    {
        $catalogo = Catalogo::where('codigo', $codigo)->first();
        $this->catalogoSelected = $catalogo ? $catalogo->toArray() : [];
        $this->openModal = true;
    }

    public function closeModal()
    {
        $this->openModal = false;
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

    public function delete($codigo)
    {
        try {
            DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_cat', $codigo)->delete();

            $catalogo = Catalogo::where('codigo', $codigo)->first();

            if ($catalogo) {
                $catalogo->delete();
                Toaster::success('El catálogo fue eliminado exitosamente');
            } else {
                Toaster::error('Error: El registro no existe');
            }
        } catch (Exception $e) {
            Toaster::error('Error: No se pudo eliminar el registro');
        }
    }
}
