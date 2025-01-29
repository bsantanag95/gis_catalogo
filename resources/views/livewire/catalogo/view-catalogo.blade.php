<div class="p-4">
    <div class="pb-4 border-b border-gray-200 mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Detalle del Catálogo</h1>
    </div>
    <div class="space-y-3">
        <!-- Código -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Código</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['codigo'] }}</x-label>
        </div>

        <!-- Descripción -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Descripción</x-label>
            <x-label class="text-gray-900 break-words max-w-xs">: {{ $catalogo['descripcion'] }}</x-label>
        </div>

        <!-- Objeto EO -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Objeto EO</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['objeto_eo'] }}</x-label>
        </div>

        <!-- Tipo Catálogo -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Tipo Catálogo</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['tipo_catalogo'] }}</x-label>
        </div>

        <!-- Fases -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Fases</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['fases'] }}</x-label>
        </div>

        <!-- Tensión -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Tensión</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['tension'] }}</x-label>
        </div>

        <!-- Tipo -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Tipo</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['tipo'] }}</x-label>
        </div>

        <!-- CUDN -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">CUDN</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['cudn'] }}</x-label>
        </div>

        <!-- Detalle Fase -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Detalle Fase</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['detalle_fase'] }}</x-label>
        </div>

        <!-- Cantidad UUCC -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Cantidad UUCC</x-label>
            <x-label class="text-gray-900">: {{ $catalogo['cant_uucc'] }}</x-label>
        </div>

        <!-- Estado -->
        <div class="flex items-start">
            <x-label class="font-semibold text-gray-700 min-w-[120px]">Estado</x-label>
            @if ($catalogo['estado'] == "1")
            <x-label class="text-gray-900">: Activo</x-label>
            @else
            <x-label class="text-gray-900">: Inactivo</x-label>
            @endif
        </div>
    </div>

    <!-- Botón Cerrar -->
    <div class="flex justify-end mt-6">
        <button
            wire:click="$dispatch('closeModal')"
            class="px-4 py-2 bg-red-600 text-white rounded-md shadow hover:bg-red-700 transition duration-200 ease-in-out">
            Cerrar
        </button>
    </div>
</div>