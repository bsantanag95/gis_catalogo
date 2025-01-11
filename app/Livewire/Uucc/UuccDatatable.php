<?php

namespace App\Livewire\Uucc;

use App\Models\UUCC;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class UuccDatatable extends Component
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
        $uucc = UUCC::where(function ($query) {
            $query->where('codigo_uucc', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                ->orWhere('norma', 'like', '%' . $this->search . '%')
                ->orWhere('clase_activo', 'like', '%' . $this->search . '%');
        })->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })->paginate($this->perPage);
        return view('livewire.uucc.uucc-datatable', compact('uucc'));
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

    public function delete($codigo_uucc)
    {
        try {
            DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_uucc', $codigo_uucc)->delete();
            $uucc = UUCC::where('codigo_uucc', $codigo_uucc)->first();

            if ($uucc) {
                $uucc->delete();
                Toaster::success('El UUCC fue eliminado exitosamente');
            } else {
                Toaster::error('Error: El registro no existe');
            }
        } catch (Exception $e) {
            Toaster::error('Error: No se pudo eliminar el registro');
        }
    }
}
