<div>
    <div class="flex justify-between items-center mb-4">
        <!-- Buscador -->
        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input id="search" wire:model.live.debounce.100ms="search" type="text" placeholder="Buscar catalogo" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
        </div>
        <!-- Selector de registros por página -->
        <div>
            <label for="perPage" class="mr-2">Mostrar:</label>
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
                    <!-- Columna para fases -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('fases')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Fases</span>
                            <x-sort-icon
                                field="fases"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para tensión -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('tension')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Tensión</span>
                            <x-sort-icon
                                field="tension"
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
                    <!-- Columna para el CUDN -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('cudn')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>CUDN</span>
                            <x-sort-icon
                                field="cudn"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para el detalle fase -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('detalle_fase')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Det. Fase</span>
                            <x-sort-icon
                                field="detalle_fase"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para cantidad uucc -->
                    <th scope="col" class="px-6 py-4 text-[10px] max-w-[150px] text-gray-900">
                        <button wire:click="sortBy('cant_uucc')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-[10px] leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Cant. UUCC</span>
                            <x-sort-icon
                                field="cant_uucc"
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
                    <td class="flex gap-3 px-6 py-4 font-normal">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->codigo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->descripcion}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->tipo_catalogo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->objeto_eo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->fases}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->tension}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->tipo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->cudn}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->detalle_fase}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->cant_uucc}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="text-xs line-clamp-1 max-w-[150px]">{{$catalogo->estado}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <button
                                wire:click="$dispatch('openModal', { component: 'catalogo.edit-catalogo', arguments: { codigo: '{{ $catalogo->codigo }}' }})"
                                class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Editar">
                                <i class="fas fa-edit text-lg"></i>
                            </button>
                            <button
                                wire:confirm="¿Estas seguro que desea eliminar el registro?"
                                wire:click="delete('{{ $catalogo->codigo }}')"
                                class="text-red-500 hover:text-red-700 ml-2 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
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