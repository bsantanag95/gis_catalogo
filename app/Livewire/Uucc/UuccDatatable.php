<?php

namespace App\Livewire\Uucc;

use App\Models\UUCC;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UuccDatatable extends Component
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
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_uucc', $codigo_uucc)->delete();

        $material = UUCC::where('codigo_uucc', $codigo_uucc)->first();

        $material->delete();
    }
}
