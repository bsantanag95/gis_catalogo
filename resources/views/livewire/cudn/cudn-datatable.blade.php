<div>
    <div class="flex justify-between items-center mb-4">
        <!-- Buscador -->
        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input id="search" wire:model.live.debounce.100ms="search" type="text" placeholder="Buscar CUDN" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
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
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <!-- Columna para el código -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('grupo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Grupo</span>
                            <x-sort-icon
                                field="grupo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>

                    <!-- Columna para la descripción -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('correlativo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Correlativo</span>
                            <x-sort-icon
                                field="correlativo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('item')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Item</span>
                            <x-sort-icon
                                field="item"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('sigla')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Sigla</span>
                            <x-sort-icon
                                field="sigla"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('detalle')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Detalle</span>
                            <x-sort-icon
                                field="detalle"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('tipo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Tipo</span>
                            <x-sort-icon
                                field="tipo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($cudn as $c)
                <tr class="hover:bg-gray-50">
                    <td class="flex gap-3 px-6 py-4 font-normal">
                        <div class="text-sm">
                            <div class="font-medium">{{$c->grupo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$c->correlativo}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$c->item}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$c->sigla}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$c->detalle}}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium">{{$c->tipo}}</div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if ($cudn->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No hay CUDN disponibles.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="px-6 py-3">{{ $cudn->links(data: ['scrollTo' => false]) }}</div>
</div>
</div>