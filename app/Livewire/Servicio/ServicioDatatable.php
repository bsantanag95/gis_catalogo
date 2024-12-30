<?php

namespace App\Livewire\Servicio;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\UUCCServicio;
use Illuminate\Support\Facades\DB;

class ServicioDatatable extends DataTableComponent
{
    protected $model = UUCCServicio::class;
    public ?int $searchFilterDebounce = 400;
    public array $perPageAccepted = [10, 25, 50, 100];

    protected $listeners = ['render' => 'render'];

    public function configure(): void
    {
        $this->setPrimaryKey('codigo_servicio');

        $this->setConfigurableAreas([
            'toolbar-left-end' => 'servicio.create-button'
        ]);
    }

    public function delete($codigo_servicio)
    {
        DB::table('GIS_CAT_CATALOGO_DETALLE')->where('codigo_servicio', $codigo_servicio)->delete();

        $servicio = UUCCServicio::where('codigo_servicio', $codigo_servicio)->first();

        $servicio->delete();
    }

    public function columns(): array
    {
        return [
            Column::make("Código", "codigo_servicio")
                ->sortable()
                ->searchable(),
            Column::make("Descripción", "descripcion")
                ->sortable()
                ->searchable(),
            Column::make('Acciones')
                ->label(fn($row) => view('servicio.actions', ['servicio' => $row]))
        ];
    }
}
