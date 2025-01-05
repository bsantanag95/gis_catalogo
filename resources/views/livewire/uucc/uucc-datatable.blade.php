<div>
    <div class="flex justify-between items-center mb-4">
        <!-- Buscador -->
        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input id="search" wire:model.live.debounce.100ms="search" type="text" placeholder="Buscar UUCC" class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
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
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <!-- Columna para el código -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('codigo_uucc')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Código</span>
                            <x-sort-icon
                                field="codigo_uucc"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>

                    <!-- Columna para la descripción -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('descripcion')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Descripción</span>
                            <x-sort-icon
                                field="descripcion"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para la unidad -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('unidad')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Unidad</span>
                            <x-sort-icon
                                field="unidad"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para la duracion -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('duracion')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Duración</span>
                            <x-sort-icon
                                field="duracion"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para Fase -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('fase')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Fase</span>
                            <x-sort-icon
                                field="fase"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para Fase -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('norma')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Norma</span>
                            <x-sort-icon
                                field="norma"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para Clase Activo -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                        <button wire:click="sortBy('clase_activo')"
                            class="flex items-center space-x-1 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            <span>Clase Activo</span>
                            <x-sort-icon
                                field="clase_activo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc" />
                        </button>
                    </th>
                    <!-- Columna para las acciones -->
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center text-xs leading-4uppercase tracking-wider">
                        Acciones
                    </th>
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
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <button
                                wire:click="$dispatch('openModal', { component: 'uucc.edit-uucc', arguments: { codigo_uucc: '{{ $u->codigo_uucc }}' }})"
                                class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Editar">
                                <i class="fas fa-edit text-lg"></i>
                            </button>
                            <button
                                wire:click="delete('{{ $u->codigo_uucc }}')"
                                wire:confirm="¿Estas seguro que desea eliminar el registro?"
                                class="text-red-500 hover:text-red-700 ml-2 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                                title="Eliminar">
                                <i class="fas fa-trash text-lg"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if ($uucc->isEmpty())
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        No hay UUCC disponibles.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="px-6 py-3">{{ $uucc->links(data: ['scrollTo' => false]) }}</div>
</div>
</div>