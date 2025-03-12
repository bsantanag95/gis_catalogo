<div class="bg-white rounded-lg p-6 max-w-2xl w-full space-y-4">
    <h3 class="text-lg font-semibold mb-4">Configuración para Grupo {{ $grupo }}</h3>

    @foreach($fields as $correlativo => $field)
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            {{ $field['label'] }}
        </label>

        @if($field['type'] === 'S')
        {{-- Campo Select --}}
        <select wire:model="selections.{{ $correlativo }}"
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200 py-2">
            <option value="">Seleccione una opción</option>
            @foreach($field['options'] as $sigla => $detalle)
            <option value="{{ $sigla }}">{{ $detalle }}</option>
            @endforeach
        </select>
        @else
        <div class="relative">
            <input
                type="number"
                wire:model.lazy="selections.{{ $correlativo }}"
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200 pr-16"
                min="0"
                placeholder="Ej: {{ str_pad('', strlen($field['sigla_pattern']), '9') }}"
                max="{{ str_pad('', strlen($field['sigla_pattern']), '9') }}"
                step="1">
            <span class="absolute right-3 top-2 text-gray-400 text-sm">
                Máx. {{ strlen($field['sigla_pattern']) }} dígitos
            </span>
        </div>
        @endif

        @error("selections.{$correlativo}")
        <span class="text-red-600 text-sm block mt-1">{{ $message }}</span>
        @enderror
    </div>
    @endforeach

    <div class="mt-6 flex justify-end space-x-3">
        <button wire:click="$dispatch('closeModal')"
            class="px-4 py-2 text-gray-600 hover:text-gray-800">
            Cancelar
        </button>
        <button wire:click="generateCudn"
            type="button"
            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors flex items-center gap-2">
            <span wire:loading.remove>Generar CUDN</span>
            <span wire:loading>Generando...</span>
            <svg wire:loading class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </button>
    </div>
</div>