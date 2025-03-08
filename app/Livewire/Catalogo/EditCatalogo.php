<?php

namespace App\Livewire\Catalogo;

use App\Models\Catalogo;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class EditCatalogo extends ModalComponent
{
    public Catalogo $catalogo;

    public $estado, $originalCodigo, $objetoEOOptions = [], $tipoCatalogoOptions = [], $uuccOptions, $selectedGroup, $uuccEntries = [];

    protected $listeners = ['cudnGenerated' => 'handleCudnGenerated'];

    protected function rules()
    {
        return [
            'catalogo.codigo' => [
                'required',
                'string',
                'max:50',
                Rule::unique('GIS_CAT_CATALOGO', 'codigo')
                    ->ignore($this->originalCodigo, 'codigo') // Usar el código original almacenado
            ],
            'catalogo.descripcion' => 'nullable|string|max:100',
            'catalogo.tipo_catalogo' => 'nullable|string|max:50',
            'catalogo.objeto_eo' => 'nullable|string|max:50',
            'catalogo.fases' => 'nullable|integer|min:0',
            'catalogo.tension' => 'nullable|string|max:50',
            'catalogo.tipo' => 'nullable|string|max:50',
            'catalogo.cudn' => 'nullable|string|max:50',
            'catalogo.detalle_fase' => 'nullable|string|max:50',
            'catalogo.cant_uucc' => 'nullable|integer|min:0|max:9999',
            'catalogo.estado' => 'nullable|integer|min:0|max:1',
            'uuccEntries.*.uucc' => 'required|exists:GIS_CAT_UUCC,codigo_uucc',
            'uuccEntries.*.cantidad' => 'required|integer|min:1',
            'catalogo.cudn' => 'required|string|max:50',
        ];
    }

    public function mount($codigo)
    {
        $this->originalCodigo = $codigo;
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
        $this->catalogo = Catalogo::where('codigo', $codigo)->firstOrFail();
        $this->estado = $this->catalogo->estado;
        $this->updateTipoCatalogoOptions($this->catalogo->objeto_eo);
        $this->uuccOptions = \App\Models\UUCC::all();
        $this->uuccEntries = $this->catalogo->uucc->map(function ($uucc) {
            return [
                'uucc' => $uucc->codigo_uucc,
                'cantidad' => $uucc->pivot->cantidad
            ];
        })->toArray();

        if (empty($this->uuccEntries)) {
            $this->uuccEntries[] = ['uucc' => '', 'cantidad' => 1];
        }

        if ($this->catalogo->cudn) {
            $this->selectedGroup = substr($this->catalogo->cudn, 0, 1);
        }
    }

    public function updatedCatalogoObjetoEo($value)
    {
        $this->updateTipoCatalogoOptions($value);
    }

    private function updateTipoCatalogoOptions($objetoEO)
    {
        $getTipoByObjeto = [
            'Accurate Route' => ['CANALIZACION SUBTERRANEA'],
            'Assembled equipment' => ['Conector Monopolar Separable Sub', 'Protección BT Subterránea'],
            'Cable Segment' => ['TRAMO SUBTERRÁNEO'],
            'Connector point' => ['PUNTO DE UNIÓN'],
            'Cross Arm' => ['ESTRUCTURA BT DE DERIVACIÓN', 'ESTRUCTURA BT DE LÍMITE DE ZONA', 'ESTRUCTURA BT DE PASO', 'ESTRUCTURA BT DE REMATE INTERMEDIO', 'ESTRUCTURA BT DE REMATE TERMINAL', 'ESTRUCTURA DE SED AÉREA', 'ESTRUCTURA MT DE DERIVACIÓN', 'ESTRUCTURA MT DE PASO', 'ESTRUCTURA MT DE REMATE', 'ESTRUCTURA MT DE REMATE INTERMEDIO'],
            'ETD Trafo' => ['TRANSFORMADOR AÉREO', 'TRANSFORMADOR DE SUPERFICIE'],
            'Ground' => ['PARARRAYOS', 'TIERRA DE PROTECCIÓN', 'TIERRA DE SERVICIO'],
            'Guy' => ['TIRANTE A PISO', 'TIRANTE A POSTE MOZO', 'TIRANTE A RIEL'],
            'Isolation Equipment' => ['DESCONECTADOR AÉREO MT', 'PROTECCIÓN BT AÉREA', 'RECONECTADOR'],
            'Line Segment' => ['TRAMO AÉREO'],
            'Meter' => ['COMPACTO DE MEDIDA'],
            'Pole' => ['POSTE'],
        ];

        $this->tipoCatalogoOptions = $getTipoByObjeto[$objetoEO] ?? [];

        if (!in_array($this->catalogo->tipo_catalogo, $this->tipoCatalogoOptions)) {
            $this->catalogo->tipo_catalogo = null;
        }
    }

    public function render()
    {
        return view('livewire.catalogo.edit-catalogo');
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

    public function update()
    {
        try {
            $this->validate();

            // Recuperar el modelo usando el código original
            $catalogo = Catalogo::where('codigo', $this->originalCodigo)->firstOrFail();
            $catalogo->fill($this->catalogo->getAttributes());
            $catalogo->estado = $this->estado;
            $catalogo->save();

            $uuccData = collect($this->uuccEntries)->mapWithKeys(
                fn($entry) => [
                    $entry['uucc'] => ['cantidad' => $entry['cantidad']]
                ]
            );

            $catalogo->uucc()->sync($uuccData);

            $this->dispatch('render')->to('Catalogo.CatalogoDatatable');

            Toaster::success('Catálogo actualizado exitosamente');
            $this->closeModal();
        } catch (\Exception $e) {
            Toaster::error('Ocurrió un error: ' . $e->getMessage());
        }
    }


    public function handleCudnGenerated($generatedCode)
    {
        $this->catalogo->cudn = $generatedCode;
        $this->dispatch('closeModal');
    }
}
