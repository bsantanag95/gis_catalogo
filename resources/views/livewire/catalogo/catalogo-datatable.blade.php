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

            <div>
                <button
                    wire:click="$dispatch('openModal', { component: 'catalogo.create-catalogo' })"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Crear Nuevo
                </button>
            </div>
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
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full table-auto border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group relative">
                        <button wire:click="sortBy('codigo')"
                            class="w-full flex items-center justify-between space-x-1 text-left font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1 text-[10px]">
                                Código
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="codigo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors w-3 h-3" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group relative">
                        <button wire:click="sortBy('descripcion')"
                            class="w-full flex items-center justify-between space-x-1 text-left font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1 text-[10px]">
                                Descripción
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="descripcion"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors w-3 h-3" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group relative">
                        <button wire:click="sortBy('tipo_catalogo')"
                            class="w-full flex items-center justify-between space-x-1 text-left font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1 text-[10px]">
                                Tipo Catálogo
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="tipo_catalogo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors w-3 h-3" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group relative">
                        <button wire:click="sortBy('objeto_eo')"
                            class="w-full flex items-center justify-between space-x-1 text-left font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1 text-[10px]">
                                Objeto EO
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="objeto_eo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors w-3 h-3" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group relative">
                        <button wire:click="sortBy('tipo')"
                            class="w-full flex items-center justify-between space-x-1 text-left font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1 text-[10px]">
                                CUDN
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="cudn"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors w-3 h-3" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group relative">
                        <button wire:click="sortBy('estado')"
                            class="w-full flex items-center justify-between space-x-1 text-left font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1 text-[10px]">
                                Estado
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="estado"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors w-3 h-3" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] group">
                        <span class="relative inline-block pb-1 text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 opacity-0 group-hover:opacity-100 group-hover:w-full"></span>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($catalogos as $catalogo)
                <tr class="hover:bg-gray-50" wire:key="{{ $catalogo->codigo }}">
                    <td class="px-6 py-4" title="{{ $catalogo->codigo }}">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->codigo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4" title="{{ $catalogo->descripcion }}">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[200px]">{{$catalogo->descripcion}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4" title="{{ $catalogo->tipo_catalogo }}">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[200px]">{{$catalogo->tipo_catalogo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4" title="{{ $catalogo->objeto_eo }}">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->objeto_eo}}</div>
                        </div>
                    </td>

                    <td class="px-6 py-4" title="{{ $catalogo->cudn }}">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->cudn}}</div>
                        </div>
                    </td>

                    @if($catalogo->estado == 1)
                    <td class="px-4 py-3 text-xs border">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Activo </span>
                    </td>
                    @else
                    <td class="px-4 py-3 text-xs border">
                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> Inactivo </span>
                    </td>
                    @endif
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-1">
                            <button
                                wire:click="viewCatalogo('{{ $catalogo->codigo }}')"
                                class="text-gray-500 hover:text-gray-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button
                                wire:click="$dispatch('openModal', { component: 'catalogo.edit-catalogo', arguments: { codigo: '{{ $catalogo->codigo }}' }})"
                                class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Editar">
                                <i class="fas fa-edit text-lg"></i>
                            </button>
                            <button
                                wire:click="$dispatch('deleteCatalogo', { codigo: '{{ $catalogo->codigo }}'})"
                                class="text-red-500 hover:text-red-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Eliminar">
                                <i class="fas fa-trash text-lg"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if ($catalogos->isEmpty())
                <tr>
                    <td colspan="12" class="px-6 py-4 text-center text-gray-500">
                        No se encontraron resultados para "{{ $search }}"
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="px-6 py-3">{{ $catalogos->links(data: ['scrollTo' => false]) }}</div>


    <!-- Modal -->
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
                class="bg-white rounded-xl border border-gray-200 shadow-2xl w-7xl w-full max-w-2xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <div class="pb-4 border-b border-gray-200 mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Detalle del Catálogo</h2>
                    </div>
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
                    <p><span class="font-medium text-gray-700">Código:</span> {{ $catalogoSelected['codigo'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Descripción:</span> {{ $catalogoSelected['descripcion'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Objeto EO:</span> {{ $catalogoSelected['objeto_eo'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Tipo Catálogo:</span> {{ $catalogoSelected['tipo_catalogo'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Fases:</span> {{ $catalogoSelected['fases'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Tensión:</span> {{ $catalogoSelected['tension'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Tipo:</span> {{ $catalogoSelected['tipo'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">CUDN:</span> {{ $catalogoSelected['cudn'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Detalle Fase:</span> {{ $catalogoSelected['detalle_fase'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Cantidad UUCC:</span> {{ $catalogoSelected['cant_uucc'] ?? 'N/A' }}</p>
                    <p><span class="font-medium text-gray-700">Estado:</span>
                        {{ isset($catalogoSelected['estado']) ? ($catalogoSelected['estado'] == 1 ? 'Activo' : 'Inactivo') : 'N/A' }}
                    </p>
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
    Livewire.on('deleteCatalogo', codigo => {
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
                Livewire.dispatch('delete', codigo)
                // Swal.fire({
                //     title: "Eliminado",
                //     text: "El registro fue eliminado",
                //     icon: "success"
                // });
            }
        });
    })
</script>
@endscript