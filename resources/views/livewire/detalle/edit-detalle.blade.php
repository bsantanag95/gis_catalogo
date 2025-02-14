<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg border border-gray-200 max-h-[80vh] overflow-y-auto">
    <!-- Encabezado -->
    <div class="flex justify-between items-center pb-4 mb-6 border-b border-gray-200">
        <h1 class="text-xl font-semibold text-gray-800">Editar Detalle</h1>
        <button
            wire:click="$dispatch('closeModal')"
            class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <form wire:submit="update" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Catálogo -->
        <div class="space-y-1">
            <label for="codigo_cat" class="block text-sm font-medium text-gray-700">Catálogo</label>
            <select
                id="codigo_cat"
                name="codigo_cat"
                wire:model.defer="detalle.codigo_cat"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 bg-white appearance-none pr-10">
                <option value="" disabled selected>Seleccionar Catálogo</option>
                @foreach($catalogoOptions as $cat)
                <option value="{{ $cat->codigo }}">{{ $cat->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_cat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- UUCC -->
        <div class="space-y-1">
            <label for="codigo_uucc" class="block text-sm font-medium text-gray-700">UUCC</label>
            <select
                id="codigo_uucc"
                name="codigo_uucc"
                wire:model.defer="detalle.codigo_uucc"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all bg-white">
                <option value="" disabled selected>Seleccionar UUCC</option>
                @foreach($uuccOptions as $u)
                <option value="{{ $u->codigo_uucc }}">{{ $u->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_uucc') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Material -->
        <div class="space-y-1">
            <label for="codigo_material" class="block text-sm font-medium text-gray-700">Material</label>
            <select
                id="codigo_material"
                name="codigo_material"
                wire:model.defer="detalle.codigo_material"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all bg-white">
                <option value="" disabled selected>Seleccionar Material</option>
                @foreach($materialOptions as $m)
                <option value="{{ $m->codigo_material }}">{{ $m->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_material') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Servicio -->
        <div class="space-y-1">
            <label for="codigo_servicio" class="block text-sm font-medium text-gray-700">Servicio</label>
            <select
                id="codigo_servicio"
                name="codigo_servicio"
                wire:model.defer="detalle.codigo_servicio"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 transition-all bg-white">
                <option value="" disabled selected>Seleccionar Servicio</option>
                @foreach($servicioOptions as $servicio)
                <option value="{{ $servicio->codigo_servicio }}">{{ $servicio->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_servicio') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
                <span>Editar Detalle</span>
            </button>
        </div>
    </form>
</div>