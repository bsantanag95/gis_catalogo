<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4">Crear Servicio</h1>
    <form wire:submit="create" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Código Servicio -->
        <div>
            <label for="codigo_servicio" class="block text-sm font-medium text-gray-700">Código Servicio</label>
            <input
                type="number"
                id="codigo_servicio"
                name="codigo_servicio"
                wire:model="codigo_servicio"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200"" />
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                wire:model="descripcion"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('servicio.descripcion') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Botones -->
        <div class="col-span-2 flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50">
                Crear Servicio
            </button>
        </div>
    </form>
</div>