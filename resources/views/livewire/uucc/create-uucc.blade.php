<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Crear UUCC</h1>
    <form wire:submit="create" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="codigo_uucc" class="block text-sm font-medium text-gray-700">Código UUCC</label>
            <input
                type="number"
                id="codigo_uucc"
                name="codigo_uucc"
                wire:model="codigo_uucc"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
        </div>
        <!-- Descripción -->
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                name="descripcion"
                wire:model="descripcion"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('uucc.descripcion') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Unidad -->
        <div>
            <label for="unidad" class="block text-sm font-medium text-gray-700">Unidad</label>
            <select
                id="unidad"
                name="unidad"
                wire:model="unidad"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" selected>Seleccione una unidad</option>
                @foreach($selectUnidad as $unidad)
                <option value="{{ $unidad }}">{{$unidad}}</option>
                @endforeach
            </select>
            @error('uucc.unidad') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Duración -->
        <div>
            <label for="duracion" class="block text-sm font-medium text-gray-700">Duración</label>
            <input
                type="text"
                id="duracion"
                name="duracion"
                wire:model="duracion"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('uucc.duracion') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Fase -->
        <div>
            <label for="fase" class="block text-sm font-medium text-gray-700">Fase</label>
            <select
                id="fase"
                name="fase"
                wire:model="fase"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" selected>Seleccione una fase</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            @error('uucc.fase') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Norma -->
        <div>
            <label for="norma" class="block text-sm font-medium text-gray-700">Norma</label>
            <input
                type="text"
                id="norma"
                name="norma"
                wire:model="norma"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('uucc.norma') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Clase Activo -->
        <div>
            <label for="clase_activo" class="block text-sm font-medium text-gray-700">Clase Activo</label>
            <input
                type="text"
                id="clase_activo"
                name="clase_activo"
                wire:model="clase_activo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('uucc.clase_activo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Botones -->
        <div class="col-span-2 flex justify-end">
            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50">
                Crear
            </button>
        </div>
    </form>
</div>