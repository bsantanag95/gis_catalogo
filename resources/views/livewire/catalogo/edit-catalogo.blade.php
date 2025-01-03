<div class="max-w-4xl mx-auto mt-8 p-6 bg-white shadow-md rounded-lg max-h-[80vh] overflow-y-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Catalogo</h1>
    <form wire:submit="update" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Código -->
        <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input
                type="text"
                id="codigo"
                name="codigo"
                wire:model.defer="catalogo.codigo"
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
                wire:model.defer="catalogo.descripcion"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.descripcion') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Objeto EO -->
        <div>
            <label for="objeto_eo" class="block text-sm font-medium text-gray-700">Objeto EO</label>
            <select
                id="objeto_eo"
                name="objeto_eo"
                wire:model.defer="catalogo.objeto_eo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">
                @foreach ($objetoEOOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
            @error('catalogo.objeto_eo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tipo Catálogo -->
        <div>
            <label for="tipo_catalogo" class="block text-sm font-medium text-gray-700">Tipo Catálogo</label>
            <select
                id="tipo_catalogo"
                name="tipo_catalogo"
                wire:model.defer="catalogo.tipo_catalogo"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200">

                <option value="" selected disabled>Seleccionar un tipo</option>

                @foreach ($tipoCatalogoOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>
            @error('catalogo.tipo_catalogo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>


        <!-- Fases -->
        <div>
            <label for="fases" class="block text-sm font-medium text-gray-700">Fases</label>
            <input
                type="number"
                id="fases"
                name="fases"
                wire:model.defer="catalogo.fases"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.fases') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tensión -->
        <div>
            <label for="tension" class="block text-sm font-medium text-gray-700">Tensión</label>
            <input
                type="text"
                id="tension"
                name="tension"
                wire:model.defer="catalogo.tension"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.tension') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Tipo -->
        <div>
            <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
            <input
                type="text"
                id="tipo"
                name="tipo"
                wire:model.defer="catalogo.tipo"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.tipo') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- CUDN -->
        <div>
            <label for="cudn" class="block text-sm font-medium text-gray-700">CUDN</label>
            <input
                type="text"
                id="cudn"
                name="cudn"
                wire:model.defer="catalogo.cudn"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.cudn') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Detalle Fase -->
        <div>
            <label for="detalle_fase" class="block text-sm font-medium text-gray-700">Detalle Fase</label>
            <input
                type="text"
                id="detalle_fase"
                name="detalle_fase"
                wire:model.defer="catalogo.detalle_fase"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.detalle_fase') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Cantidad UUCC -->
        <div>
            <label for="cant_uucc" class="block text-sm font-medium text-gray-700">Cantidad UUCC</label>
            <input
                type="number"
                id="cant_uucc"
                name="cant_uucc"
                wire:model.defer="catalogo.cant_uucc"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.cant_uucc') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Estado -->
        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <input
                type="number"
                id="estado"
                name="estado"
                wire:model.defer="catalogo.estado"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200" />
            @error('catalogo.estado') <span class="text-red-600">{{ $message }}</span> @enderror
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