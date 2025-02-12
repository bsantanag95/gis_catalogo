<div>
    <!-- Header con controles -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-4 p-4 bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
            <!-- Buscador -->
            <div class="relative w-full md:w-80">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input
                    id="search"
                    wire:model.live.debounce.100ms="search"
                    type="text"
                    placeholder="Buscar material"
                    class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>

            @auth
            <div>
                <button
                    wire:click="$dispatch('openModal', { component: 'servicio.create-servicio' })"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Crear Nuevo
                </button>
            </div>
            @endauth
        </div>

        <div class="mt-4 md:mt-0 relative">
            <select
                id="perPage"
                wire:change='update'
                wire:model="perPage"
                class="bg-white border border-gray-300 text-gray-700 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block pr-8 pl-3 py-2.5 shadow-sm appearance-none w-20">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <!-- Tabla -->
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-4">
        <table class="w-full border-collapse bg-white text-gray-700">
            <thead class="bg-gray-50">
                <tr>
                    @foreach(['codigo_material', 'descripcion', 'cantidad', 'unidad', 'uucc'] as $field)
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        <button
                            wire:click="sortBy('{{ $field }}')"
                            class="flex items-center gap-1 hover:text-indigo-600 transition-colors">
                            {{ ucfirst(str_replace('_', ' ', $field)) }}
                            <x-sort-icon
                                field="{{ $field }}"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    @endforeach
                    @auth
                    <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Acciones</th>
                    @endauth
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($materiales as $material)
                <tr
                    class="hover:bg-gray-50 transition-colors"
                    wire:key="{{ $material->codigo_material }}">
                    <td class="px-6 py-4 text-sm">{{ $material->codigo_material }}</td>
                    <td class="px-6 py-4 text-sm">{{ $material->descripcion }}</td>
                    <td class="px-6 py-4 text-sm">{{ $material->cantidad }}</td>
                    <td class="px-6 py-4 text-sm">{{ $material->unidad }}</td>
                    <td class="px-6 py-4">
                        <button
                            wire:click="mostrarUUCC({{ $material->uucc }})"
                            class="text-indigo-600 hover:text-indigo-700 transition-colors font-medium">
                            {{ $material->uucc }}
                        </button>
                    </td>
                    @auth
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">
                            <button
                                wire:click="$dispatch('openModal', { component: 'material.edit-material', arguments: { codigo_material: '{{ $material->codigo_material }}' }})"
                                class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-md transition-all"
                                title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button
                                wire:click="$dispatch('deleteMaterial', { codigo_material: '{{ $material->codigo_material }}'})"
                                class="p-2 text-red-600 hover:bg-red-50 rounded-md transition-all"
                                title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                    @endauth
                </tr>
                @endforeach
                @if ($materiales->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No hay materiales disponibles.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="px-6 py-3 text-gray-600">
        {{ $materiales->links(data: ['scrollTo' => false]) }}
    </div>

    <!-- Modal -->
    <div
        x-data="{ open: @entangle('modalAbierto') }"
        x-cloak>
        <div
            x-show="open"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center p-4">
            <div
                x-show="open"
                @click.outside="open = false"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white rounded-xl border border-gray-200 shadow-2xl w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Detalles del UUCC</h2>
                    <button
                        @click="open = false"
                        wire:click="cerrarModal"
                        class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="space-y-3 text-sm text-gray-600">
                    <p><span class="font-medium text-gray-700">Descripción:</span> {{ $uuccSeleccionado['descripcion'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Unidad:</span> {{ $uuccSeleccionado['unidad'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Duración:</span> {{ $uuccSeleccionado['duracion'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Fase:</span> {{ $uuccSeleccionado['fase'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Norma:</span> {{ $uuccSeleccionado['norma'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Clase Activo:</span> {{ $uuccSeleccionado['clase_activo'] ?? 'N/A' }}</p>
                </div>

                <div class="mt-6 flex justify-end">
                    <button
                        @click="open = false"
                        wire:click="cerrarModal"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors shadow-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
    Livewire.on('deleteMaterial', codigo_material => {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El registro se eliminará para siempre",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, elimínalo"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete', codigo_material)
            }
        });
    })
</script>
@endscript