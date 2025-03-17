<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use App\Models\UUCC;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;


class CreateCatalogo extends ModalComponent
{
    public $objetoEOOptions = [];
    public $uuccEntries = [['uucc' => '', 'cantidad' => 1]];
    public $uuccOptions, $codigo, $descripcion, $tipo_catalogo, $objeto_eo = '', $fases, $tension, $tipo, $cudn, $detalle_fase, $estado = 1;


    protected $listeners = ['cudnSelected' => 'handleCudnSelected', 'cudnGenerated' => 'handleCudnGenerated'];

    protected $rules = [
        'codigo' => 'required|string|max:50|unique:GIS_CAT_CATALOGO,codigo',
        'descripcion' => 'nullable|string|max:100',
        'tipo_catalogo' => 'nullable|string|max:50',
        'objeto_eo' => 'nullable|string|max:50',
        'fases' => 'nullable|integer|min:0',
        'tension' => 'nullable|string|max:50',
        'tipo' => 'nullable|string|max:50',
        'cudn' => 'nullable|string|max:50',
        'detalle_fase' => 'nullable|string|max:50',
        'estado' => 'nullable|integer|min:0|max:1',
        'uuccEntries.*.uucc' => 'required|exists:GIS_CAT_UUCC,codigo_uucc',
        'uuccEntries.*.cantidad' => 'required|integer|min:1',
    ];

    public function mount()
    {
        $this->objetoEOOptions = [
            'Accurate Route',
            'Assembled equipment',
            'Cable Segment',
            'Connector point',
            'Cross Arm',
            'ETD Trafo',
            'Ground',
            'Guy',
            'Isolation Equipment',
            'Line Segment',
            'Meter',
            'Pole',
        ];

        $this->uuccOptions = UUCC::all();
    }

    public function handleCudnSelected($group)
    {
        $this->cudn = $group;
    }

    public function handleCudnGenerated($generatedCode)
    {
        $this->cudn = $generatedCode;
        $this->dispatch('closeModal'); // Cierra todos los modales
    }

    public function render()
    {
        return view('livewire.catalogo.create-catalogo');
    }

    public function addUuccEntry()
    {
        $this->uuccEntries[] = ['uucc' => '', 'cantidad' => 1];
    }

    public function removeUuccEntry($index)
    {
        unset($this->uuccEntries[$index]);
        $this->uuccEntries = array_values($this->uuccEntries);
    }

    public function create()
    {
        try {
            $this->validate();

            //$cant_uucc = collect($this->uuccEntries)->sum('cantidad');
            $cant_uucc = array_sum(array_column($this->uuccEntries, 'cantidad'));

            $catalogo = Catalogo::create([
                'codigo' => $this->codigo,
                'descripcion' => $this->descripcion,
                'tipo_catalogo' => $this->tipo_catalogo,
                'objeto_eo' => $this->objeto_eo,
                'fases' => $this->fases,
                'tension' => $this->tension,
                'tipo' => $this->tipo,
                'cudn' => $this->cudn,
                'detalle_fase' => $this->detalle_fase,
                'cant_uucc' => $cant_uucc,
                'estado' => $this->estado,
            ]);

            foreach ($this->uuccEntries as $entry) {
                $catalogo->uucc()->attach($entry['uucc'], ['cantidad' => $entry['cantidad']]);
            }

            $this->dispatch('render')->to('Catalogo.CatalogoDatatable');

            Toaster::success('Catálogo creado exitosamente');
            $this->closeModal();
        } catch (\Exception $e) {
            Toaster::error('Ocurrió un error: ' . $e->getMessage());
        }
    }
}
