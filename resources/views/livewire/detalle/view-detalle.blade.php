<div class="bg-white rounded-lg shadow-xl overflow-hidden">
    <!-- Header -->
    <div class="bg-blue-800 px-6 py-4">
        <h2 class="text-xl font-bold text-white">Detalle de {{ $codigoCat }}</h2>
    </div>

    <!-- Lista -->
    <div class="max-h-[70vh] overflow-y-auto p-4">
        <ul class="space-y-2">
            @forelse($uuccDetalle as $uucc)
            <li
                class="group rounded-lg p-4 transition-all duration-200 hover:bg-indigo-50 border hover:border-indigo-200 cursor-pointer"
                wire:click="$dispatch('openModal', { component: 'detalle.uucc-detalle', arguments: { codigoUucc: '{{ $uucc['codigo_uucc'] }}' }})">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="font-semibold text-gray-700 group-hover:text-indigo-700">{{ $uucc['codigo_uucc'] }}</span>
                        <p class="text-sm text-gray-600 mt-1">{{ $uucc['descripcion'] ?? 'Sin descripción' }}</p>
                    </div>
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </div>
            </li>
            @empty
            <li class="text-center py-6 text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-2">No hay UUCC relacionadas</p>
            </li>
            @endforelse
        </ul>
    </div>

    <!-- Footer -->
    <div class="border-t px-6 py-4 bg-gray-50">
        <button
            wire:click="$dispatch('closeModal')"
            class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cerrar
        </button>
    </div>
</div>