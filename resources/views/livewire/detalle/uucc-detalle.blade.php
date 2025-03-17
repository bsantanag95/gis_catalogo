<div class="bg-white rounded-lg shadow-xl overflow-hidden w-full max-w-4xl z-20">
    <!-- Header -->
    <div class="bg-blue-900 px-5 py-3">
        <h2 class="text-lg font-bold text-white flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Detalle de {{ $codigoUucc }}
        </h2>
    </div>

    <!-- Contenido -->
    <div class="max-h-[80vh] overflow-y-auto p-4">
        <!-- Servicios -->
        <div class="bg-gray-50 rounded-lg p-3 mb-4">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h3 class="text-base font-semibold text-gray-700">Servicios</h3>
            </div>

            <ul class="space-y-2">
                @forelse($servicios as $servicio)
                <li class="bg-white rounded-md p-2 shadow-xs hover:shadow-sm transition-shadow text-sm">
                    <div class="font-medium text-green-600 text-sm">{{ $servicio['codigo_servicio'] }}</div>
                    <div class="text-xs text-gray-600 mt-0.5">{{ $servicio['descripcion'] ?? 'Sin descripción' }}</div>
                </li>
                @empty
                <li class="text-center py-2 text-gray-500 bg-white rounded-md text-sm">
                    No hay servicios asociados
                </li>
                @endforelse
            </ul>
        </div>

        <!-- Materiales -->
        <div class="bg-gray-50 rounded-lg p-3">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                <h3 class="text-base font-semibold text-gray-700">Materiales</h3>
            </div>

            <ul class="space-y-2">
                @forelse($materiales as $material)
                <li class="bg-white rounded-md p-2 shadow-xs hover:shadow-sm transition-shadow text-sm">
                    <div class="font-medium text-indigo-600 text-sm">{{ $material['codigo_material'] }}</div>
                    <div class="text-xs text-gray-600 mt-0.5">{{ $material['descripcion'] ?? 'Sin descripción' }}</div>
                </li>
                @empty
                <li class="text-center py-2 text-gray-500 bg-white rounded-md text-sm">
                    No hay materiales asociados
                </li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <div class="border-t px-4 py-3 bg-gray-50">
        <button
            wire:click="$dispatch('closeModal')"
            class="w-full inline-flex justify-center items-center px-3 py-1.5 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors text-sm">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cerrar
        </button>
    </div>
</div>