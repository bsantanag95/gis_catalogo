<?php

namespace App\Livewire\Cudn;

use App\Models\Cudn;
use LivewireUI\Modal\ModalComponent;

class GenerateCudn extends ModalComponent
{
    public $grupo;
    public $fields = [];
    public $selections = [];

    public function mount($grupo)
    {
        $this->grupo = $grupo;
        $this->loadGroupStructure();
    }

    protected function loadGroupStructure()
    {
        $rawData = Cudn::where('grupo', $this->grupo)
            ->orderBy('correlativo')
            ->get()
            ->groupBy('correlativo');

        foreach ($rawData as $correlativo => $items) {
            $firstItem = $items->first();
            $isInput = $firstItem->tipo === 'I';

            $this->fields[$correlativo] = [
                'label' => $firstItem->item,
                'type' => $firstItem->tipo,
                'options' => $isInput ? ['sigla_pattern' => $firstItem->sigla]
                    : $items->pluck('detalle', 'sigla')->toArray(),
                'sigla_pattern' => $firstItem->sigla // Nuevo campo
            ];
        }
    }

    public function generateCudn()
    {
        $validationRules = [];
        $cudnParts = [];

        foreach ($this->fields as $correlativo => $field) {
            $key = "selections.{$correlativo}";

            if ($field['type'] === 'S') {
                // Reglas para selects
                $validationRules[$key] = ['required', 'string'];
                $cudnParts[$correlativo] = $this->selections[$correlativo] ?? '';
            } else {
                // Reglas para inputs numéricos
                $length = strlen($field['sigla_pattern']);
                $validationRules[$key] = [
                    'required',
                    'numeric',
                    'min:0',
                    'max:' . str_pad('', $length, '9')
                ];

                // Formatear con ceros a la izquierda
                $value = $this->selections[$correlativo] ?? '0';
                $cudnParts[$correlativo] = str_pad($value, $length, '0', STR_PAD_LEFT);
            }
        }

        // Validación
        $this->validate(
            ['selections' => 'required|array'] + $validationRules,
            [],
            ['selections.*' => 'campo'] // Nombres personalizados para mensajes de error
        );

        // Generar código CUDN
        ksort($cudnParts);
        $generatedCode = implode('', $cudnParts);

        $this->dispatch('cudnGenerated', $generatedCode);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.cudn.generate-cudn');
    }
}
