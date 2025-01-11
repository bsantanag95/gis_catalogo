<?php

namespace App\Livewire\Servicio;

use App\Models\UUCCServicio;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class ServicioDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;

    protected $listeners = ['render' => 'render', 'delete'];

    public function mount()
    {
        //
    }

    public function render()
    {
        $servicios = UUCCServicio::where(function ($query) {
            $query->where('codigo_servicio', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%');
        })->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })->paginate($this->perPage);
        return view('livewire.servicio.servicio-datatable', compact('servicios'));
    }

    public function delete($codigo_servicio)
    {
        try {
            DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_servicio', $codigo_servicio)->delete();

            $servicio = UUCCServicio::where('codigo_servicio', $codigo_servicio)->first();

            if ($servicio) {
                $servicio->delete();
                Toaster::success('El servicio fue eliminado exitosamente');
            } else {
                Toaster::error('Error: El registro no existe');
            }
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
