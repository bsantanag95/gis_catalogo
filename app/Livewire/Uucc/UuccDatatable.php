<?php

namespace App\Livewire\Uucc;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UUCC;
use Illuminate\Support\Facades\DB;

class UuccDatatable extends DataTableComponent
{
    protected $model = UUCC::class;
    public ?int $searchFilterDebounce = 400;
    public array $perPageAccepted = [10, 25, 50, 100];

    protected $listeners = ['render' => 'render'];

    public function configure(): void
    {
        $this->setPrimaryKey('codigo_uucc');

        $this->setTdAttributes(function (Column $column, $row) {
            if ($column->isField('descripcion')) {
                return [
                    'class' => 'text-xs text-left p-0',
                    'style' => 'max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;',
                    'title' => $row->{$column->getField()}
                ];
            }

            return ['class' => 'max-w-xs text-ellipsis text-xs'];
        });

        $this->setConfigurableAreas([
            'toolbar-left-end' => 'uucc.create-button'
        ]);
    }

    public function delete($codigo_uucc)
    {
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_uucc', $codigo_uucc)->delete();

        $material = UUCC::where('codigo_uucc', $codigo_uucc)->first();

        $material->delete();
    }

    public function columns(): array
    {
        return [
            Column::make("Código", "codigo_uucc")
                ->sortable()
                ->searchable(),
            Column::make("Descripción", "descripcion")
                ->sortable()
                ->searchable(),
            Column::make("Unidad", "unidad")
                ->sortable()
                ->searchable(),
            Column::make("Duración", "duracion")
                ->sortable()
                ->searchable(),
            Column::make("Fase", "fase")
                ->sortable()
                ->searchable(),
            Column::make("Norma", "norma")
                ->sortable()
                ->searchable(),
            Column::make("Clase Activo", "clase_activo")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->label(fn($row) => view('uucc.actions', ['uucc' => $row]))
        ];
    }
}
