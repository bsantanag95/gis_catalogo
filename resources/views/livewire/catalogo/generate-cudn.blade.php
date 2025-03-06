<div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
    <h3 class="text-lg font-semibold mb-4">Seleccionar Grupo</h3>

    <select
        wire:model="selectedGroup"
        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-200 mb-4">
        <option value="" selected disabled>Seleccionar un grupo</option>
        @foreach($groups as $group)
        <option value="{{ $group }}">{{ $group }}</option>
        @endforeach
    </select>

    <div class="mt-6 flex justify-end space-x-3">
        <button
            wire:click="$dispatch('closeModal')"
            class="px-4 py-2 text-gray-600 hover:text-gray-800">
            Cancelar
        </button>
        <button
            wire:click="$dispatch('openModal', {
                component: 'cudn.cudn-group-modal',
                arguments: { grupo: $wire.selectedGroup }
            })"
            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Siguiente
        </button>
    </div>
</div>