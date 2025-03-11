<?php

namespace App\Livewire\Servicio;

use App\Models\UUCCServicio;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $servicios = UUCCServicio::with('catalogoDetalle')
            ->where(function ($query) {
                $query->where('codigo_servicio', 'like', '%' . $this->search . '%')
                    ->orWhere('descripcion', 'like', '%' . $this->search . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            }, function ($query) {
                $query->orderBy('descripcion', 'asc');
            })
            ->paginate($this->perPage);


        return view('livewire.servicio.servicio-datatable', compact('servicios'));
    }


    public function delete($codigo_servicio)
    {
        try {
            DB::transaction(function () use ($codigo_servicio) {
                $servicio = UUCCServicio::findOrFail($codigo_servicio);

                $servicio->catalogoDetalle()->delete();

                $servicio->delete();
            });

            Toaster::success('Servicio eliminado exitosamente');
        } catch (ModelNotFoundException $e) {
            Toaster::error('Error: El servicio no existe');
            Log::error("Intento de eliminar servicio inexistente: $codigo_servicio");
        } catch (Exception $e) {
            Toaster::error('Error al eliminar el servicio. Por favor intente nuevamente.');
            Log::error("Error eliminando servicio $codigo_servicio: " . $e->getMessage());
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
