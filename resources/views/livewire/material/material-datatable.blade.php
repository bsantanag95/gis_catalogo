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
                    wire:click="$dispatch('openModal', { component: 'material.create-material' })"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-all">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Crear Nuevo
                </button>
            </div>
            @endauth
        </div>

        <!-- Selector de registros por página -->
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
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    @foreach(['codigo_material', 'descripcion', 'cantidad', 'unidad', 'uucc'] as $field)
                    <th scope="col" class="px-6 py-4 group relative">
                        <button
                            wire:click="sortBy('{{ $field }}')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                {{ ucfirst(str_replace('_', ' ', $field)) }}
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="{{ $field }}"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    @endforeach
                    @auth
                    <th scope="col" class="px-6 py-4 group relative">
                        <div class="flex justify-center">
                            <span class="relative inline-block pb-1 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 opacity-0 group-hover:opacity-100 group-hover:w-full"></span>
                            </span>
                        </div>
                    </th>
                    @endauth
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($materiales as $material)
                <tr class="hover:bg-gray-50" wire:key="{{ $material->codigo_material }}">
                    <td class="flex gap-3 px-6 py-4 font-normal">
                        <div class="text-sm">
                            <div class="font-medium">{{ $material->codigo_material }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{ $material->descripcion }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">{{ $material->cantidad }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">{{ $material->unidad }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-between min-w-[20px]">
                            <span class="text-sm">{{ $material->uucc }}</span>
                            @if($material->uucc)
                            <button
                                wire:click="viewUucc({{ $material->uucc }})"
                                class="text-gray-500 hover:text-gray-700"
                                title="Ver detalles de UUCC">
                                <i class="fas fa-eye"></i>
                            </button>
                            @endif
                        </div>
                    </td>
                    @auth
                    <td class="px-6 py-4">
                        <div class="flex justify-end space-x-2">
                            <button
                                wire:click="$dispatch('openModal', { component: 'material.edit-material', arguments: { codigo_material: '{{ $material->codigo_material }}' }})"
                                class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Editar">
                                <i class="fas fa-edit text-lg"></i>
                            </button>
                            <button
                                wire:click="$dispatch('deleteMaterial', { codigo_material: '{{ $material->codigo_material }}'})"
                                class="text-red-500 hover:text-red-700 ml-2 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Eliminar">
                                <i class="fas fa-trash text-lg"></i>
                            </button>
                        </div>
                    </td>
                    @endauth
                </tr>
                @endforeach
                @if ($materiales->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500"> No se encontraron resultados para "{{ $search }}"</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="px-6 py-3">{{ $materiales->links(data: ['scrollTo' => false]) }}</div>

    <!-- Modal UUCC -->
    <div
        x-data="{ open: @entangle('openModal') }"
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
                        wire:click="closeModal"
                        class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-3 text-sm text-gray-600">
                    <p><span class="font-medium text-gray-700">Descripción:</span> {{ $uuccSelected['descripcion'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Unidad:</span> {{ $uuccSelected['unidad'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Duración:</span> {{ $uuccSelected['duracion'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Fase:</span> {{ $uuccSelected['fase'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Norma:</span> {{ $uuccSelected['norma'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Clase Activo:</span> {{ $uuccSelected['clase_activo'] ?? 'N/A' }}</p>
                </div>

                <div class="mt-6 flex justify-end">
                    <button
                        @click="open = false"
                        wire:click="closeModal"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all">
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