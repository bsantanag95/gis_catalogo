<div class="w-full max-w-full mx-auto mt-4 pt-6 p-4 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <div class="flex justify-between items-center pb-4 mb-6 border-b border-gray-200">
        <h1 class="text-xl font-semibold text-gray-800">Editar Catálogo</h1>
        <button
            wire:click="$dispatch('closeModal')"
            class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <form wire:submit="update" class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4 sm:px-0">
        <!-- Código -->
        <div class="space-y-1">
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input
                type="text"
                id="codigo"
                wire:model.defer="catalogo.codigo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                placeholder="Código del catálogo">
        </div>

        <!-- Descripción -->
        <div class="space-y-1">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input
                type="text"
                id="descripcion"
                wire:model.defer="catalogo.descripcion"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                placeholder="Descripción del catálogo">
            @error('catalogo.descripcion')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Objeto EO -->
        <div class="space-y-1">
            <label for="objeto_eo" class="block text-sm font-medium text-gray-700">Objeto EO</label>
            <select
                id="objeto_eo"
                wire:model.defer="catalogo.objeto_eo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white appearance-none pr-10 bg-no-repeat bg-[right_0.75rem_center] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3Ryb2tlPSIjNmI3MjgwIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBkPSJNNiA4bDQgNCA0LTQiLz48L3N2Zz4=')]">
                @foreach ($objetoEOOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
            @error('catalogo.objeto_eo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Tipo Catálogo -->
        <div class="space-y-1">
            <label for="tipo_catalogo" class="block text-sm font-medium text-gray-700">Tipo Catálogo</label>
            <select
                id="tipo_catalogo"
                wire:model.defer="catalogo.tipo_catalogo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white appearance-none pr-10 bg-no-repeat bg-[right_0.75rem_center] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3Ryb2tlPSIjNmI3MjgwIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBkPSJNNiA4bDQgNCA0LTQiLz48L3N2Zz4=')]">
                <option value="" selected disabled>Seleccionar un tipo</option>
                @foreach ($tipoCatalogoOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
            @error('catalogo.tipo_catalogo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Fases -->
        <div class="space-y-1">
            <label for="fases" class="block text-sm font-medium text-gray-700">Fases</label>
            <select
                id="fases"
                wire:model.defer="catalogo.fases"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white appearance-none pr-10 bg-no-repeat bg-[right_0.75rem_center] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3Ryb2tlPSIjNmI3MjgwIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBkPSJNNiA8bDQgNCA0LTQiLz48L3N2Zz4=')]">
                <option value="">Seleccione una fase</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            @error('catalogo.fases')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Tensión -->
        <div class="space-y-1">
            <label for="tension" class="block text-sm font-medium text-gray-700">Tensión</label>
            <input
                type="text"
                id="tension"
                wire:model.defer="catalogo.tension"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                placeholder="Tensión del catálogo">
            @error('catalogo.tension')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Tipo -->
        <div class="space-y-1">
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
            <select
                id="tipo"
                wire:model.defer="catalogo.tipo"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-white appearance-none pr-10 bg-no-repeat bg-[right_0.75rem_center] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyMCAyMCIgc3Ryb2tlPSIjNmI3MjgwIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBkPSJNNiA8bDQgNCA0LTQiLz48L3N2Zz4=')]">
                <option value="">Seleccione un tipo</option>
                <option value="AÉREO">Aéreo</option>
                <option value="SUBTERRÁNEO">Subterráneo</option>
            </select>
            @error('catalogo.tipo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Detalle Fase -->
        <div class="space-y-1">
            <label for="detalle_fase" class="block text-sm font-medium text-gray-700">Detalle Fase</label>
            <input
                type="text"
                id="detalle_fase"
                wire:model.defer="catalogo.detalle_fase"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                placeholder="Detalle fase del catálogo">
            @error('catalogo.detalle_fase')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- CUDN -->
        <div class="space-y-1 md:col-span-2">
            <label for="cudn" class="block text-sm font-medium text-gray-700">CUDN</label>
            <div class="flex gap-2">
                <input
                    type="text"
                    id="cudn"
                    wire:model.defer="catalogo.cudn"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                    placeholder="CUDN del catálogo"
                    readonly>
                <button
                    type="button"
                    wire:click="$dispatch('openModal', { component: 'cudn.group-selector' })"
                    class="mt-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Generar
                </button>
            </div>
            @error('catalogo.cudn')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
        </div>

        <!-- Sección UUCC -->
        <div class="md:col-span-2">
            <div class="space-y-6">
                <div class="flex items-center justify-between pb-2 border-b border-gray-200">
                    <div>
                        <h3 class="text-base font-medium text-gray-900">UUCC Relacionados</h3>
                        <p class="text-sm text-gray-500 mt-1">Actualice los códigos UUCC y sus cantidades</p>
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
                                    class="w-full px-3 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-sm">
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
                                    class="w-full px-3 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-sm">
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
        <div class="space-y-1">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <div class="flex items-center h-9">
                <button
                    type="button"
                    wire:click="$set('estado', {{ $estado ? 0 : 1 }})"
                    class="relative inline-flex items-center h-6 rounded-full w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    :class="{ 'bg-indigo-500': {{ $estado }}, 'bg-gray-300': !{{ $estado }} }">
                    <span
                        class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform"
                        :class="{ 'translate-x-6': {{ $estado }}, 'translate-x-1': !{{ $estado }} }"></span>
                </button>
            </div>
            @error('catalogo.estado')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
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
                <span wire:loading.remove>Actualizar Catálogo</span>
                <span wire:loading>Actualizando...</span>
            </button>
        </div>
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