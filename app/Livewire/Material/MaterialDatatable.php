<?php

namespace App\Livewire\Material;

use App\Models\UUCC;
use App\Models\UUCCMaterial;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class MaterialDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;
    public $modalAbierto = false;
    public $uuccSeleccionado = [];

    protected $listeners = ['render' => 'render', 'delete'];

    public function cerrarModal()
    {
        $this->modalAbierto = false;
    }

    public function mount()
    {
        //
    }

    public function render()
    {
        $materiales = UUCCMaterial::where(function ($query) {
            $query->where('codigo_material', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                ->orWhere('unidad', 'like', '%' . $this->search . '%')
                ->orWhere('uucc', 'like', '%' . $this->search . '%');
        })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            }, function ($query) {
                $query->orderBy('descripcion', 'asc');
            })
            ->paginate($this->perPage);

        return view('livewire.material.material-datatable', compact('materiales'));
    }

    public function delete($codigo_material)
    {
        try {
            DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_material', $codigo_material)->delete();

            $material = UUCCMaterial::where('codigo_material', $codigo_material)->first();

            if ($material) {
                $material->delete();
                Toaster::success('El material fue eliminado exitosamente');
            } else {
                Toaster::error('Error: El registro no existe');
            }
        } catch (Exception $e) {
            Toaster::error('Error: No se pudo eliminar el registro');
        }
    }

    public function mostrarUUCC($codigo)
    {
        $uucc = UUCC::where('codigo_uucc', $codigo)->first();
        $this->uuccSeleccionado = $uucc ? $uucc->toArray() : [];
        $this->modalAbierto = true;
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
