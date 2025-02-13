<div>
    <div class="flex flex-col md:flex-row justify-between items-center mb-4 p-4 bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
            <!-- Buscador 
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
                    placeholder="Buscar Transacción"
                    class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>
            -->
            @auth
            <div>
                <button
                    wire:click="$dispatch('openModal', { component: 'catalogo-uucc.create-catalogo-uucc' })"
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
                        <button wire:click="sortBy('codigo_cat')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Catálogo
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="codigo_cat"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('codigo_uucc')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                UUCC
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
                        <button wire:click="sortBy('cantidad')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Cantidad
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="cantidad"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($catalogouucc as $cu)
                <tr class="hover:bg-gray-50">
                    <td class="flex gap-3 px-6 py-4 font-normal">
                        <div class="text-sm">
                            <div class="font-medium">{{$cu->catalogo->descripcion}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$cu->uucc_column->descripcion}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$cu->cantidad}}</div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if ($catalogouucc->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No hay transacciones disponibles.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="px-6 py-3">{{ $catalogouucc->links(data: ['scrollTo' => false]) }}</div>
</div>
</div>