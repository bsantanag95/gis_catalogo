<div class="bg-white rounded-lg shadow-xl overflow-hidden w-full max-w-4xl">
    <!-- Header -->
    <div class="bg-blue-900 px-6 py-4 sticky top-0 shadow-md z-10">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-white">
                Gestión de UUCC - {{ $codigoCat }}
            </h2>
        </div>

        <!-- Selector para agregar nuevo UUCC -->
        <div class="mt-3 flex gap-2">
            <select wire:model="nuevoUUCC"
                class="w-full border rounded-md px-3 py-1.5 text-xs bg-white focus:ring-2 focus:ring-blue-500">
                <option value="">Seleccionar UUCC para agregar...</option>
                @foreach($uuccDisponibles as $uucc)
                <option value="{{ $uucc->codigo_uucc }}">
                    {{ $uucc->codigo_uucc }} - {{ $uucc->descripcion }}
                </option>
                @endforeach
            </select>
            <button wire:click="addUUCC"
                class="bg-blue-600 text-white px-3 py-1.5 rounded-md text-xs hover:bg-blue-700 transition-colors flex items-center gap-1">
                <i class="fas fa-plus"></i> Agregar
            </button>
        </div>
    </div>

    <div class="p-4 max-h-[70vh] overflow-y-auto">
        @forelse($uuccs as $codigoUucc => $detalles)
        <div class="bg-gray-50 rounded-lg shadow-sm mb-3 border border-gray-200" x-data="{ isOpen: false }">
            <!-- Header UUCC -->
            <div class="flex justify-between items-center p-3">
                <div class="flex items-center gap-2 hover:bg-gray-100 cursor-pointer flex-1"
                    @click="isOpen = !isOpen">
                    <button class="text-gray-600 transform transition-transform duration-200 text-xs"
                        :class="{ 'rotate-90': isOpen }">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <h3 class="text-sm font-medium text-gray-800">
                        {{ $detalles['uucc']->codigo_uucc }}
                        <span class="text-gray-600 font-normal">- {{ $detalles['uucc']->descripcion }}</span>
                    </h3>
                </div>
                <button
                    @click.stop
                    wire:click="$dispatch('confirmUucc', { codigoUucc: '{{ $codigoUucc }}' })"
                    class="text-red-500 hover:text-red-700 px-2 py-1 rounded-md text-xs transition-colors"
                    title="Quitar UUCC del catálogo">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>

            <!-- Contenido desplegable -->
            <div x-show="isOpen" x-collapse class="px-3 pb-3 space-y-3">
                <!-- Sección Servicios -->
                <div class="bg-white rounded border border-gray-200">
                    <div class="flex items-center justify-between p-2 border-b">
                        <h4 class="font-medium text-green-600 flex items-center gap-1 text-xs">
                            <i class="fas fa-tools"></i>
                            Servicios
                        </h4>
                        <div class="flex gap-1 w-3/5">
                            <select wire:model="nuevoServicio.{{ $codigoUucc }}"
                                class="w-full border rounded px-2 py-1 text-xs focus:ring-1 focus:ring-green-500">
                                <option value="">Seleccionar servicio...</option>
                                @foreach($serviciosDisponibles as $servicio)
                                <option value="{{ $servicio->codigo_servicio }}">
                                    {{ $servicio->codigo_servicio }} - {{ $servicio->descripcion }}
                                </option>
                                @endforeach
                            </select>
                            <button wire:click="addServicio('{{ $codigoUucc }}')"
                                class="bg-green-600 text-white px-2 py-1 rounded text-xs hover:bg-green-700 transition-colors">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-2 space-y-1">
                        @forelse($detalles['servicios'] as $servicio)
                        <div class="flex justify-between items-center px-3 py-1.5 bg-gray-50 rounded hover:bg-gray-100">
                            <div class="flex-1 truncate">
                                <div class="text-xs font-medium text-gray-800 truncate">{{ $servicio->codigo_servicio }}</div>
                                <div class="text-[0.7rem] text-gray-600 truncate">{{ $servicio->descripcion }}</div>
                            </div>
                            <button wire:click="deleteServicio('{{ $codigoUucc }}', '{{ $servicio->codigo_servicio }}')"
                                class="text-red-400 hover:text-red-600 px-1.5 py-0.5 rounded-sm transition-colors"
                                title="Eliminar servicio">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                        @empty
                        <div class="text-center py-2 text-gray-500 text-xs">
                            No hay servicios
                        </div>
                        @endforelse
                    </div>
                </div>
                <!-- Sección Materiales -->
                <div class="bg-white rounded border border-gray-200">
                    <div class="flex items-center justify-between p-2 border-b">
                        <h4 class="font-medium text-indigo-600 flex items-center gap-1 text-xs">
                            <i class="fas fa-box-open"></i>
                            Materiales
                        </h4>
                        <div class="flex gap-1 w-3/5">
                            <select wire:model="nuevoMaterial.{{ $codigoUucc}}"
                                class="w-full border rounded px-2 py-1 text-xs focus:ring-1 focus:ring-indigo-500">
                                <option value="">Seleccionar material...</option>
                                @foreach($materialesDisponibles as $material)
                                <option value="{{ $material->codigo_material }}">
                                    {{ $material->codigo_material }} - {{ $material->descripcion }}
                                </option>
                                @endforeach
                            </select>
                            <button wire:click="addMaterial('{{ $codigoUucc }}')"
                                class="bg-indigo-600 text-white px-2 py-1 rounded text-xs hover:bg-indigo-700 transition-colors">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-2 space-y-1">
                        @forelse($detalles['materiales'] as $material)
                        <div class="flex justify-between items-center px-3 py-1.5 bg-gray-50 rounded hover:bg-gray-100">
                            <div class="flex-1 truncate">
                                <div class="text-xs font-medium text-gray-800 truncate">{{ $material->codigo_material }}</div>
                                <div class="text-[0.7rem] text-gray-600 truncate">{{ $material->descripcion }}</div>
                            </div>
                            <button wire:click="deleteMaterial('{{ $codigoUucc }}', '{{ $material->codigo_material }}')"
                                class="text-red-400 hover:text-red-600 px-1.5 py-0.5 rounded-sm transition-colors"
                                title="Eliminar material">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                        @empty
                        <div class="text-center py-2 text-gray-500 text-xs">
                            No hay materiales
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-4">
            <div class="inline-block p-3 bg-blue-50 rounded-full mb-2">
                <i class="fas fa-info-circle text-blue-600 text-lg"></i>
            </div>
            <h3 class="text-gray-700 font-medium mb-1 text-sm">Sin UUCC asociados</h3>
            <p class="text-gray-500 text-xs">Use el botón de edición en la tabla principal para agregar UUCC</p>
        </div>
        @endforelse
    </div>

    <!-- Footer -->
    <div class="border-t px-4 py-3 bg-gray-50 sticky bottom-0">
        <button wire:click="$dispatch('closeModal')"
            class="w-full px-4 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition-colors">
            Cerrar
        </button>
    </div>
</div>

@script
<script>
    Livewire.on('confirmUucc', (data) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción eliminará todos los materiales y servicios asociados!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('confirmDelete', data);
            }
        });
    })
</script>
@endscript