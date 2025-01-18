<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4">Crear Detalle</h1>
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
            <label for="codigo_uucc" class="block text-sm font-medium text-gray-700">UUCC</label>
            <select
                id="codigo_uucc"
                name="codigo_uucc"
                wire:model="codigo_uucc"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" disabled selected>Seleccionar UUCC</option>
                @foreach($uuccOptions as $u)
                <option value="{{ $u->codigo_uucc }}">{{ $u->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_uucc') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="codigo_material" class="block text-sm font-medium text-gray-700">Material</label>
            <select
                id="codigo_material"
                name="codigo_material"
                wire:model="codigo_material"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" disabled selected>Seleccionar Material</option>
                @foreach($materialOptions as $m)
                <option value="{{ $m->codigo_material }}">{{ $m->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_material') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="codigo_servicio" class="block text-sm font-medium text-gray-700">Servicio</label>
            <select
                id="codigo_servicio"
                name="codigo_servicio"
                wire:model="codigo_servicio"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" disabled selected>Seleccionar Servicio</option>
                @foreach($servicioOptions as $servicio)
                <option value="{{ $servicio->codigo_servicio }}">{{ $servicio->descripcion }}</option>
                @endforeach
            </select>
            @error('codigo_servicio') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <!-- Botones -->
        <div class="col-span-2 flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50">
                Crear Detalle
            </button>
        </div>
    </form>
</div>