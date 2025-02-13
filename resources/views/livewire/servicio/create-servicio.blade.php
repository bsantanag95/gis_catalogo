<div class="max-w-3xl mx-auto p-6 bg-white rounded-xl border border-gray-200 shadow-2xl">
    <!-- Encabezado -->
    <div class="flex justify-between items-center pb-4 mb-6 border-b border-gray-200">
        <h1 class="text-xl font-semibold text-gray-800">Nuevo Servicio</h1>
        <button
            wire:click="$dispatch('closeModal')"
            class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <form wire:submit="create" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Código Servicio -->
        <div class="space-y-1">
            <label for="codigo_servicio" class="block text-sm font-medium text-gray-700">Código Servicio</label>
            <input
                type="number"
                min="0"
                id="codigo_servicio"
                name="codigo_servicio"
                wire:model="codigo_servicio"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all placeholder-gray-400" />
            @error('codigo_servicio') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Descripción -->
        <div class="space-y-1">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                wire:model="descripcion"
                required
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all placeholder-gray-400" />
            @error('descripcion') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
                <span>Crear Servicio</span>
            </button>
        </div>
    </form>
</div>