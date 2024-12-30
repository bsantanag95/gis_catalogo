<div class="flex space-x-4">
    <button wire:click="$dispatch('openModal', { component: 'cudn.edit-cudn', arguments: { codigo: '{{ $cudn->codigo }}' }})"
        class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
        title="Editar">
        <i class="fas fa-edit text-lg"></i>
    </button>
    <button
        class="text-red-500 hover:text-red-700 ml-2 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
        title="Eliminar">
        <i class="fas fa-trash text-lg"></i>
    </button>
</div>