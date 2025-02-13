<div class="max-w-3xl mx-auto p-6 mt-16 bg-white rounded-xl border border-gray-200 shadow-2xl max-h-[80vh] overflow-y-auto">
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
                disabled
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm bg-gray-100 text-gray-500 cursor-not-allowed"
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

        <!-- CUDN -->
        <div class="space-y-1">
            <label for="cudn" class="block text-sm font-medium text-gray-700">CUDN</label>
            <input
                type="text"
                id="cudn"
                wire:model.defer="catalogo.cudn"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                placeholder="CUDN del catálogo">
            @error('catalogo.cudn')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
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

        <!-- Cantidad UUCC -->
        <div class="space-y-1">
            <label for="cant_uucc" class="block text-sm font-medium text-gray-700">Cantidad UUCC</label>
            <input
                type="number"
                id="cant_uucc"
                wire:model.defer="catalogo.cant_uucc"
                min="0"
                onkeydown="if(event.key === 'e' || event.key === 'E' || event.key === '-') event.preventDefault();"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all"
                placeholder="Cantidad UUCC">
            @error('catalogo.cant_uucc')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
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
                <span>Actualizar Catálogo</span>
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