<div class="w-full max-w-full mx-auto mt-4 pt-6 p-4 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <div class="pb-4 border-b border-gray-200 mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Nuevo Catálogo</h1>
    </div>
    <form wire:submit="create" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Código -->
        <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input
                type="text"
                id="codigo"
                name="codigo"
                wire:model="codigo"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('codigo') <span class="text-red-600">{{ $message }}</span> @enderror
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
            @error('descripcion') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <!-- Elimina el campo cant_uucc existente y reemplaza con: -->

        <!-- Objeto EO -->
        <div>
            <label for="objeto_eo" class="block text-sm font-medium text-gray-700">Objeto EO</label>
            <select
                id="objeto_eo"
                name="objeto_eo"
                wire:model="objeto_eo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" selected disabled>Seleccionar un objeto</option>
                @foreach ($objetoEOOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
            @error('objeto_eo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tipo Catálogo -->
        <div>
            <label for="tipo_catalogo" class="block text-sm font-medium text-gray-700">Tipo Catálogo</label>
            <select
                id="tipo_catalogo"
                name="tipo_catalogo"
                wire:model="tipo_catalogo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
            </select>
            @error('tipo_catalogo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <!-- Fases -->
        <div>
            <label for="fases" class="block text-sm font-medium text-gray-700">Fases</label>
            <select
                id="fases"
                name="fases"
                wire:model="fases"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" selected>Seleccione una fase</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            @error('fases') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tensión -->
        <div>
            <label for="tension" class="block text-sm font-medium text-gray-700">Tensión</label>
            <input
                type="text"
                id="tension"
                name="tension"
                wire:model="tension"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('tension') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tipo -->
        <div>
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
            <select
                id="tipo"
                name="tipo"
                wire:model="tipo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                <option value="" selected>Seleccione una fase</option>
                <option value="AÉREO">Aéreo</option>
                <option value="SUBTERRÁNEO">Subterráneo</option>
            </select>
            @error('tipo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Detalle Fase -->
        <div>
            <label for="detalle_fase" class="block text-sm font-medium text-gray-700">Detalle Fase</label>
            <input
                type="text"
                id="detalle_fase"
                name="detalle_fase"
                wire:model="detalle_fase"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('detalle_fase') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- CUDN -->
        <div class="space-y-1 md:col-span-2">
            <label for="cudn" class="block text-sm font-medium text-gray-700">CUDN</label>
            <div class="flex gap-2">
                <input
                    type="text"
                    id="cudn"
                    name="cudn"
                    wire:model="cudn"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200"
                    readonly>
                <button
                    type="button"
                    wire:click="$dispatch('openModal', { component: 'cudn.group-selector' })"
                    class="mt-1 px-3 border border-gray-300 rounded-md hover:bg-gray-50">
                    Generar
                </button>
            </div>
            @error('cudn') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <!--UUCC-->
        <div class="md:col-span-2">
            <div class="space-y-6">
                <div class="flex items-center justify-between pb-2 border-b border-gray-200">
                    <div>
                        <h3 class="text-base font-medium text-gray-900">UUCC</h3>
                    </div>
                    <button
                        type="button"
                        wire:click="addUuccEntry"
                        class="flex items-center gap-1 px-3 py-1.5 bg-indigo-50 text-indigo-700 rounded-md hover:bg-indigo-100 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Nuevo UUCC
                    </button>
                </div>

                <div class="space-y-4">
                    @foreach ($uuccEntries as $index => $entry)
                    <div class="group relative p-4 bg-gray-50 rounded-lg border border-gray-200 hover:border-indigo-200 transition-colors">
                        <div class="grid grid-cols-12 gap-4 items-start">
                            <!-- UUCC -->
                            <div class="col-span-12 md:col-span-8">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Código UUCC</label>
                                <select
                                    wire:model="uuccEntries.{{ $index }}.uucc"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200 text-sm py-2">
                                    <option value="">Seleccionar UUCC...</option>
                                    @foreach($uuccOptions as $uucc)
                                    <option value="{{ $uucc->codigo_uucc }}">{{ $uucc->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error("uuccEntries.{$index}.uucc")
                                <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Cantidad -->
                            <div class="col-span-12 md:col-span-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                                <input
                                    type="number"
                                    wire:model="uuccEntries.{{ $index }}.cantidad"
                                    min="1"
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200 text-sm py-2">
                                @error("uuccEntries.{$index}.cantidad")
                                <span class="text-red-600 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Botón Eliminar -->
                            <div class="col-span-12 md:col-span-1 flex justify-end md:justify-start md:pt-7">
                                @if($index > 0)
                                <button
                                    type="button"
                                    wire:click="removeUuccEntry({{ $index }})"
                                    class="text-red-400 hover:text-red-600 transition-colors"
                                    title="Eliminar UUCC">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Estado -->
        <div class="flex items-center">
            <label for="estado" class="block text-sm font-medium text-gray-700 mr-4">Estado</label>
            <button
                type="button"
                id="estado"
                wire:click="$set('estado', {{ $estado ? 0 : 1 }})"
                class="relative inline-flex items-center h-6 rounded-full w-11 focus:outline-none"
                :class="{ 'bg-indigo-500': {{ $estado }}, 'bg-gray-300': !{{ $estado }} }">
                <span
                    class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform"
                    :class="{ 'translate-x-6': {{ $estado }}, 'translate-x-1': !{{ $estado }} }"></span>
            </button>
            @error('estado') <span class="text-red-600 ml-2">{{ $message }}</span> @enderror
        </div>
        <!-- Botones -->
        <button
            type="submit"
            class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600 transition-colors flex items-center gap-2"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-50 cursor-not-allowed">
            <span wire:loading.remove>Crear</span>
            <span wire:loading>Creando...</span>
            <svg wire:loading class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </button>
    </form>
</div>


@script
<script>
    const objeto_eo = document.getElementById('objeto_eo');
    const tipo_catalogo = document.getElementById('tipo_catalogo');

    const getTipoByObjeto = {
        'Accurate Route': ['CANALIZACION SUBTERRANEA'],
        'Assembled equipment': ['Conector Monopolar Separable Sub', 'Protección BT Subterránea'],
        'Cable Segment': ['TRAMO SUBTERRÁNEO'],
        'Connector point': ['PUNTO DE UNIÓN'],
        'Cross Arm': ['ESTRUCTURA BT DE DERIVACIÓN', 'ESTRUCTURA BT DE LÍMITE DE ZONA', 'ESTRUCTURA BT DE PASO', 'ESTRUCTURA BT DE REMATE INTERMEDIO', 'ESTRUCTURA BT DE REMATE TERMINAL', 'ESTRUCTURA DE SED AÉREA', 'ESTRUCTURA MT DE DERIVACIÓN', 'ESTRUCTURA MT DE PASO', 'ESTRUCTURA MT DE REMATE', 'ESTRUCTURA MT DE REMATE INTERMEDIO'],
        'ETD Trafo': ['TRANSFORMADOR AÉREO', 'TRANSFORMADOR DE SUPERFICIE'],
        'Ground': ['PARARRAYOS', 'TIERRA DE PROTECCIÓN', 'TIERRA DE SERVICIO'],
        'Guy': ['TIRANTE A PISO', 'TIRANTE A POSTE MOZO', 'TIRANTE A RIEL'],
        'Isolation Equipment': ['DESCONECTADOR AÉREO MT', 'PROTECCIÓN BT AÉREA', 'RECONECTADOR'],
        'Line Segment': ['TRAMO AÉREO'],
        'Meter': ['COMPACTO DE MEDIDA'],
        'Pole': ['POSTE'],
    };

    const addTipoToSelect = (value) => {
        const selectedObjeto = value;
        const options = getTipoByObjeto[selectedObjeto] || [];
        let optionsHTML = `<option value="" selected disabled>Seleccionar un tipo</option>`;
        options.forEach(element => {
            optionsHTML += `<option value="${element}">${element}</option>`;
        });
        tipo_catalogo.innerHTML = optionsHTML;
    }

    window.onload = () => {
        const obj = objeto_eo.value;
        addTipoToSelect(obj);
    }

    objeto_eo.addEventListener('change', (e) => {
        addTipoToSelect(e.target.value);
    });
</script>
@endscript