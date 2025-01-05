<?php

namespace App\Livewire\Cudn;

use App\Models\CUDN;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CudnDatatable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $sortField;
    public $sortAsc = true;

    public function mount()
    {
        //
    }

    public function render()
    {
        $cudn = CUDN::where(function ($query) {
            $query->where('item', 'like', '%' . $this->search . '%')
                ->orWhere('detalle', 'like', '%' . $this->search . '%');
        })->when($this->sortField, function ($query) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        })->paginate($this->perPage);
        return view('livewire.cudn.cudn-datatable', compact('cudn'));
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
