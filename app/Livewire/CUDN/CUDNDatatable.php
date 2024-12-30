<?php

namespace App\Livewire\CUDN;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CUDN;

class CUDNDatatable extends DataTableComponent
{
    protected $model = CUDN::class;
    public ?int $searchFilterDebounce = 400;
    public array $perPageAccepted = [10, 25, 50, 100];

    protected $listeners = ['render' => 'render'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        // $this->setConfigurableAreas([
        //     'toolbar-left-end' => 'tables.create-button'
        // ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Grupo", "grupo")
                ->sortable()
                ->searchable(),
            Column::make("Correlativo", "correlativo")
                ->sortable()
                ->searchable(),
            Column::make("Item", "item")
                ->sortable()
                ->searchable(),
            Column::make("Sigla", "sigla")
                ->sortable()
                ->searchable(),
            Column::make("Detalle", "detalle")
                ->sortable()
                ->searchable(),
            Column::make("Tipo", "tipo")
                ->sortable()
                ->searchable(),
            // Column::make('Acciones')
            //     ->label(fn($row) => view('cudn.actions', ['cudn' => $row]))
        ];
    }
}
