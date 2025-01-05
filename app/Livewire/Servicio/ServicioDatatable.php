<?php

namespace App\Livewire\Servicio;

use App\Models\UUCCServicio;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ServicioDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;

    protected $listeners = ['render' => 'render'];

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
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_servicio', $codigo_servicio)->delete();

        $servicio = UUCCServicio::where('codigo_servicio', $codigo_servicio)->first();

        $servicio->delete();
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
