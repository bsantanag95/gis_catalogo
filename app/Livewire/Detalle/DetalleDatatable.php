<?php

namespace App\Livewire\Detalle;

use App\Models\Catalogo;
use App\Models\CatalogoDetalle;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Exception;
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
    public $selectedCatalogo = null;
    public $uuccDetalle = [];

    protected $listeners = ['render' => 'render', 'delete'];

    public function openModal($codigoCat)
    {
        $this->selectedCatalogo = $codigoCat;
        $this->uuccDetalle = Catalogo::where('codigo', $codigoCat)
            ->with('detalle.uucc')
            ->get()
            ->flatMap(fn($cat) => $cat->detalle->pluck('uucc'))
            ->unique()
            ->values();

        $this->dispatch('openModal', $this->selectedCatalogo);
    }


    public function render()
    {
        $catalogos = Catalogo::with(['detalle.uucc', 'detalle.material', 'detalle.servicio'])
            ->when($this->search, function ($query) {
                $query->where('codigo', 'like', "%{$this->search}%")
                    ->orWhere('descripcion', 'like', "%{$this->search}%");
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->paginate($this->perPage);

        return view('livewire.detalle.detalle-datatable', compact('catalogos'));
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
