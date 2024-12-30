<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Editar Registro</h1>
    <form wire:submit.prevent="update" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Grupo -->
        <div>
            <label for="grupo" class="block text-sm font-medium text-gray-700">Grupo</label>
            <input
                type="text"
                id="grupo"
                name="grupo"
                wire:model.defer="cudn.grupo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cudn.grupo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Correlativo -->
        <div>
            <label for="correlativo" class="block text-sm font-medium text-gray-700">Correlativo</label>
            <input
                type="number"
                id="correlativo"
                name="correlativo"
                wire:model.defer="cudn.correlativo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cudn.correlativo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Ítem -->
        <div>
            <label for="item" class="block text-sm font-medium text-gray-700">Ítem</label>
            <input
                type="text"
                id="item"
                name="item"
                wire:model.defer="cudn.item"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cudn.item') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Sigla -->
        <div>
            <label for="sigla" class="block text-sm font-medium text-gray-700">Sigla</label>
            <input
                type="text"
                id="sigla"
                name="sigla"
                wire:model.defer="cudn.sigla"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cudn.sigla') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Detalle -->
        <div>
            <label for="detalle" class="block text-sm font-medium text-gray-700">Detalle</label>
            <input
                type="text"
                id="detalle"
                name="detalle"
                wire:model.defer="cudn.detalle"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cudn.detalle') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tipo -->
        <div>
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
            <input
                type="text"
                id="tipo"
                name="tipo"
                wire:model.defer="cudn.tipo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cudn.tipo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Botón de actualización -->
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