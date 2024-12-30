@props(['rowData'])

<div
    x-show="open"
    x-cloak
    x-on:click.self="open = false"
    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-700 rounded-lg p-6 w-1/3">
        <h2 class="text-xl font-semibold mb-4">Editar Registro</h2>

        <form
            x-bind:action="`/${rowData.controller}/editar/${rowData.id}`"
            method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium">Descripción</label>
                <input
                    type="text"
                    id="descripcion"
                    name="descripcion"
                    x-bind:value="rowData.descripcion"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
            </div>

            <div class="flex justify-end space-x-4">
                <button type="button" x-on:click="open = false" class="px-4 py-2 bg-gray-300 rounded-md">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Guardar</button>
            </div>
        </form>
    </div>
</div>