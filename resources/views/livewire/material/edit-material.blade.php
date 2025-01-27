<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Material</h1>
    <form wire:submit="update" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="codigo_material" class="block text-sm font-medium text-gray-700">Código Material</label>
            <input
                type="text"
                id="codigo_material"
                name="codigo_material"
                wire:model.defer="material.codigo_material"
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
                wire:model.defer="material.descripcion"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('material.descripcion') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Cantidad -->
        <div>
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input
                type="number"
                step="0.00001"
                id="cantidad"
                name="cantidad"
                wire:model.defer="material.cantidad"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('material.cantidad') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Unidad -->
        <div>
            <label for="unidad" class="block text-sm font-medium text-gray-700">Unidad</label>
            <select
                id="unidad"
                name="unidad"
                wire:model="material.unidad"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" selected>Seleccione una unidad</option>
                @foreach($selectUnidad as $unidad)
                <option value="{{ $unidad }}">{{$unidad}}</option>
                @endforeach
            </select>
            @error('material.unidad') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- UUCC -->
        <div>
            <label for="uucc" class="block text-sm font-medium text-gray-700">UUCC</label>
            <select
                id="uucc"
                name="uucc"
                wire:model.defer="material.uucc"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" disabled selected>Seleccionar UUCC</option>
                @foreach($uuccOptions as $u)
                <option value="{{ $u->codigo_uucc }}">{{ $u->descripcion }}</option>
                @endforeach
            </select>
            @error('uucc') <span class="text-red-600">{{ $message }}</span> @enderror
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