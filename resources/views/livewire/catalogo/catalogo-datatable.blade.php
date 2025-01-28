<div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center space-x-4 mt-4 md:mt-0">
            <!-- Buscador -->
            <div class="relative flex items-center">
                <span class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
                <input id="search" wire:model.live.debounce.100ms="search" type="text" placeholder="Buscar catalogo" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>
            <div>
                <button
                    wire:click="$dispatch('openModal', { component: 'catalogo.create-catalogo' })"
                    class="inline-flex justify-center px-4 py-2 w-full text-sm font-medium text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Crear Nuevo
                </button>
            </div>
        </div>
        <!-- Selector de registros por página -->
        <div>
            <select id="perPage" wire:change='update' wire:model="perPage" class="bg-gray-50 border w-16 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    <!-- Columna para el código -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('codigo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Código</span>
                            <x-sort-icon
                                field="codigo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para la descripción -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('descripcion')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Descripción</span>
                            <x-sort-icon
                                field="descripcion"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para tipo catalogo -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('tipo_catalogo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Tipo Catálogo</span>
                            <x-sort-icon
                                field="tipo_catalogo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para objeto eo -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('objeto_eo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Objeto EO</span>
                            <x-sort-icon
                                field="objeto_eo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para el tipo -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('tipo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Tipo</span>
                            <x-sort-icon
                                field="tipo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>

                    <!-- Columna para el estado -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('estado')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Estado</span>
                            <x-sort-icon
                                field="estado"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para las acciones -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <span
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
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

                    <td class="px-6 py-4" title="{{ $catalogo->tipo }}">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->tipo}}</div>
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
                                wire:click="$dispatch('openModal', { component: 'catalogo.view-catalogo', arguments: { codigo: '{{ $catalogo->codigo }}' }})"
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
                        No hay catálogos disponibles.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="px-6 py-3">{{ $catalogos->links(data: ['scrollTo' => false]) }}</div>
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