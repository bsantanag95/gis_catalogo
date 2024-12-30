<?php

namespace App\Livewire\Material;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UUCCMaterial;
use Illuminate\Support\Facades\DB;

class MaterialDatatable extends DataTableComponent
{
    protected $model = UUCCMaterial::class;
    public ?int $searchFilterDebounce = 400;
    public array $perPageAccepted = [10, 25, 50, 100];

    protected $listeners = ['render' => 'render'];

    public function configure(): void
    {
        $this->setPrimaryKey('codigo_material');

        $this->setConfigurableAreas([
            'toolbar-left-end' => 'material.create-button'
        ]);
    }

    public function delete($codigo_material)
    {
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_material', $codigo_material)->delete();

        $material = UUCCMaterial::where('codigo_material', $codigo_material)->first();

        $material->delete();
    }

    public function columns(): array
    {
        return [
            Column::make("Código", "codigo_material")
                ->sortable()
                ->searchable(),
            Column::make("Descripción", "descripcion")
                ->sortable()
                ->searchable(),
            Column::make("Cantidad", "cantidad")
                ->sortable()
                ->searchable(),
            Column::make("Unidad", "unidad")
                ->sortable()
                ->searchable(),
            Column::make("UUCC", "uucc")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->label(fn($row) => view('material.actions', ['material' => $row]))
        ];
    }
}
