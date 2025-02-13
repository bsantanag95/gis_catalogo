<div class="max-w-3xl mx-auto p-6 bg-white rounded-xl border border-gray-200 shadow-2xl">
    <!-- Encabezado -->
    <div class="flex justify-between items-center pb-4 mb-6 border-b border-gray-200">
        <h1 class="text-xl font-semibold text-gray-800">Editar UUCC</h1>
        <button
            wire:click="$dispatch('closeModal')"
            class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <form wire:submit="update" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Código UUCC -->
        <div class="space-y-1">
            <label for="codigo_uucc" class="block text-sm font-medium text-gray-700">Código UUCC</label>
            <input
                type="number"
                id="codigo_uucc"
                name="codigo_uucc"
                wire:model.defer="uucc.codigo_uucc"
                disabled
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-500 cursor-not-allowed focus:ring-0" />
        </div>

        <!-- Descripción -->
        <div class="space-y-1">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                wire:model.defer="uucc.descripcion"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all placeholder-gray-400" />
            @error('uucc.descripcion') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Unidad -->
        <div class="space-y-1">
            <label for="unidad" class="block text-sm font-medium text-gray-700">Unidad</label>
            <select
                id="unidad"
                name="unidad"
                wire:model="uucc.unidad"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
                <option value="" selected>Seleccione una unidad</option>
                @foreach($selectUnidad as $unidad)
                <option value="{{ $unidad }}">{{$unidad}}</option>
                @endforeach
            </select>
            @error('uucc.unidad') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Duración -->
        <div class="space-y-1">
            <label for="duracion" class="block text-sm font-medium text-gray-700">Duración</label>
            <input
                type="text"
                id="duracion"
                name="duracion"
                wire:model.defer="uucc.duracion"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" />
            @error('uucc.duracion') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Fase -->
        <div class="space-y-1">
            <label for="fase" class="block text-sm font-medium text-gray-700">Fase</label>
            <select
                id="fase"
                name="fase"
                wire:model="uucc.fase"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white">
                <option value="" selected>Seleccione una fase</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            @error('uucc.fase') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Norma -->
        <div class="space-y-1">
            <label for="norma" class="block text-sm font-medium text-gray-700">Norma</label>
            <input
                type="text"
                id="norma"
                name="norma"
                wire:model.defer="uucc.norma"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" />
            @error('uucc.norma') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Clase Activo -->
        <div class="space-y-1">
            <label for="clase_activo" class="block text-sm font-medium text-gray-700">Clase Activo</label>
            <input
                type="text"
                id="clase_activo"
                name="clase_activo"
                wire:model.defer="uucc.clase_activo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all" />
            @error('uucc.clase_activo') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Botones -->
        <div class="md:col-span-2 pt-6 flex justify-end gap-3">
            <button
                type="button"
                wire:click="$dispatch('closeModal')"
                class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
                Cancelar
            </button>
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all flex items-center">
                <svg wire:loading class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Actualizar UUCC</span>
            </button>
        </div>
    </form>
</div>