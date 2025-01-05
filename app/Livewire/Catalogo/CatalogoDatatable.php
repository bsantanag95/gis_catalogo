<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CatalogoDatatable extends Component
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
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_cat', $codigo)->delete();

        $catalogo = Catalogo::where('codigo', $codigo)->first();

        $catalogo->delete();
    }
}
