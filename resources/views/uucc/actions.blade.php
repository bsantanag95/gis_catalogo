<div class="flex space-x-4">
    <button wire:click="$dispatch('openModal', { component: 'uucc.edit-uucc', arguments: { codigo_uucc: '{{ $uucc->codigo_uucc }}' }})"
        class="text-blue-500 hover:text-blue-700 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
        title="Editar">
        <i class="fas fa-edit text-lg"></i>
    </button>
    <button
        wire:confirm="¿Estas seguro que desea eliminar el registro?"
        wire:click="delete('{{ $uucc->codigo_uucc }}')"
        class="text-red-500 hover:text-red-700 ml-2 cursor-pointer flex items-center justify-center w-10 h-10 rounded-md transition-all duration-200"
        title="Eliminar">
        <i class="fas fa-trash text-lg"></i>
    </button>
</div>