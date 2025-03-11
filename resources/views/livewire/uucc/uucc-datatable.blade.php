<div>
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
                    placeholder="Buscar catálogo"
                    class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>

            @auth
            <div>
                <button
                    wire:click="$dispatch('openModal', { component: 'uucc.create-uucc' })"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
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
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('codigo_uucc')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Código
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="codigo_uucc"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('descripcion')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Descripción
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="descripcion"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('unidad')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Unidad
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="unidad"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('duracion')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Duración
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="duracion"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('fase')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Fase
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="fase"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('norma')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Norma
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="norma"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('clase_activo')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Clase Activo
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="clase_activo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    @auth
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center group">
                        <span class="relative inline-block pb-1 text-xs leading-4 uppercase tracking-wider">
                            Acciones
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 opacity-0 group-hover:opacity-100 group-hover:w-full"></span>
                        </span>
                    </th>
                    @endauth
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($uucc as $u)
                <tr class="hover:bg-gray-50" wire:key="{{ $u->codigo_uucc }}">
                    <td class="flex gap-3 px-6 py-4 font-normal">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->codigo_uucc}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->descripcion}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->unidad}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->duracion}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->fase}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->norma}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$u->clase_activo}}</div>
                        </div>
                    </td>
                    @auth
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <button
                                wire:click="$dispatch('openModal', { component: 'uucc.edit-uucc', arguments: { codigo_uucc: '{{ $u->codigo_uucc }}' }})"
                                class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Editar">
                                <i class="fas fa-edit text-lg"></i>
                            </button>
                            <button
                                wire:click="$dispatch('deleteUucc', { codigo_uucc: '{{ $u->codigo_uucc }}'})"
                                class="text-red-500 hover:text-red-700 ml-2 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Eliminar">
                                <i class="fas fa-trash text-lg"></i>
                            </button>
                        </div>
                    </td>
                    @endauth
                </tr>
                @endforeach
                @if ($uucc->isEmpty())
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        No se encontraron resultados para "{{ $search }}"
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="px-6 py-3">{{ $uucc->links(data: ['scrollTo' => false]) }}</div>
</div>
</div>
@script
<script>
    Livewire.on('deleteUucc', codigo_uucc => {
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
                Livewire.dispatch('delete', codigo_uucc)
            }
        });
    })
</script>
@endscript