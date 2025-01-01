<?php

namespace App\Livewire\Catalogo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Catalogo;
use Illuminate\Support\Facades\DB;

class CatalogoDatatable extends DataTableComponent
{
    protected $model = Catalogo::class;
    public ?int $searchFilterDebounce = 200;
    public array $perPageAccepted = [10, 25, 50, 100];

    protected $listeners = ['render' => 'render'];

    public function configure(): void
    {
        $this->setPrimaryKey('codigo');

        $this->setTdAttributes(function (Column $column, $row) {
            if (in_array($column->getField(), ['descripcion', 'tipo_catalogo', 'objeto_eo'])) {
                return [
                    'class' => 'text-xs text-left p-0',
                    'style' => 'max-width: 110px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;',
                    'title' => $row->{$column->getField()}
                ];
            }

            return ['class' => 'max-w-xs text-ellipsis text-xs'];
        });

        $this->setConfigurableAreas([
            'toolbar-left-end' => 'catalogo.create-button'
        ]);
    }

    public function delete($codigo)
    {
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_cat', $codigo)->delete();

        $catalogo = Catalogo::where('codigo', $codigo)->first();

        $catalogo->delete();
    }

    public function columns(): array
    {
        return [
            Column::make("Código", "codigo")
                ->sortable()
                ->searchable(),
            Column::make("Tipo Catalogo", "tipo_catalogo")
                ->sortable()
                ->searchable(),
            Column::make("Descripción", "descripcion")
                ->sortable()
                ->searchable(),
            Column::make("Objeto EO", "objeto_eo")
                ->sortable()
                ->searchable(),
            Column::make("Tension", "tension")
                ->sortable()
                ->searchable(),
            Column::make("Tipo", "tipo")
                ->sortable()
                ->searchable(),
            Column::make("Det. Fase", "detalle_fase")
                ->sortable()
                ->searchable(),
            Column::make("Cantidad", "cant_uucc")
                ->sortable()
                ->searchable(),
            Column::make("CUDN", "cudn")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->label(fn($row) => view('catalogo.actions', ['catalogo' => $row]))
        ];
    }
}
