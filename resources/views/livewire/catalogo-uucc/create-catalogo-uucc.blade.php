<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <div class="pb-4 border-b border-gray-200 mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Nuevo Catálogo UUCC</h1>
    </div>
    <form wire:submit="create" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="codigo_cat" class="block text-sm font-medium text-gray-700">Catálogo</label>
            <select
                id="codigo_cat"
                name="codigo_cat"
                wire:model="codigo_cat"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" disabled selected>Seleccionar Catálogo</option>
                @foreach($catalogoOptions as $cat)
                <option value="{{ $cat->codigo }}">{{ $cat->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_cat') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="uucc" class="block text-sm font-medium text-gray-700">UUCC</label>
            <select
                id="uucc"
                name="uucc"
                wire:model="uucc"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" disabled selected>Seleccionar UUCC</option>
                @foreach($uuccOptions as $u)
                <option value="{{ $u->codigo_uucc }}">{{ $u->descripcion }}</option>
                @endforeach
            </select>
            @error('uucc') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input
                type="number"
                id="cantidad"
                name="cantidad"
                wire:model="cantidad"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('cantidad') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <!-- Botones -->
        <div class="col-span-2 flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50">
                Crear Catalogo UUCC
            </button>
        </div>
    </form>
</div>