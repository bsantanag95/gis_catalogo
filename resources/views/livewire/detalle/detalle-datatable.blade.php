<div>
    <div class="flex flex-col md:flex-row justify-between items-center mb-4 p-4 bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
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

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
        <table class="w-full bg-white text-sm text-left text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('codigo')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Código
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                            <x-sort-icon
                                field="codigo"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                                class="text-gray-400 group-hover:text-indigo-500 transition-colors" />
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-4 group relative">
                        <button wire:click="sortBy('descripcion')"
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                Descripcion
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
                        <button
                            class="w-full flex items-center justify-between space-x-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider transition-all duration-200 hover:text-indigo-600">
                            <span class="relative pb-1">
                                UUCC
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </span>
                        </button>
                    </th>
                    @auth<th class="px-6 py-4">Acciones</th>@endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($catalogos as $catalogo)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $catalogo->codigo }}</td>
                    <td class="px-6 py-4">{{ $catalogo->descripcion }}</td>
                    <td class="px-6 py-4">
                        <button wire:click="$dispatch('openModal', { component: 'detalle.view-detalle', arguments: { codigoCat: '{{ $catalogo->codigo }}' }})"
                            class="text-gray-500 hover:text-gray-700"
                            title="Ver detalles de UUCC">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    @auth
                    <td class="px-6 py-4">
                        <button wire:click="$dispatch('openModal', { component: 'detalle.manage-uucc', arguments: { codigoCat: '{{ $catalogo->codigo }}' }})"
                            class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
                            title="Editar">
                            <i class="fas fa-edit text-lg"></i>
                        </button>
                    </td>
                    @endauth
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                        No se encontraron resultados para "{{ $search }}"
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-3">{{ $catalogos->links(data: ['scrollTo' => false]) }}</div>
</div>

@script
<script>
    Livewire.on('deleteDetalle', id => {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El registro se eliminará para siempre",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, elimínalo"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete', id)
            }
        });
    });
</script>
@endscript