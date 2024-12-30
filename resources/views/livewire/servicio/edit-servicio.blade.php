<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Servicio</h1>
    <form wire:submits="update" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Código Servicio -->
        <div>
            <label for="codigo_servicio" class="block text-sm font-medium text-gray-700">Código Servicio</label>
            <input
                type="number"
                id="codigo_servicio"
                name="codigo_servicio"
                wire:model.defer="servicio.codigo_servicio"
                disabled
                class="mt-1 block w-full border-gray-300 rounded-md bg-gray-100 text-gray-500 cursor-not-allowed shadow-sm focus:ring-0" />
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                wire:model.defer="servicio.descripcion"
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
                Actualizar
            </button>
        </div>
    </form>
</div>