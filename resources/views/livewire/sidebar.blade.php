<div x-data="{ open: false }" class="relative">
    <input type="checkbox" id="check" class="hidden" x-model="open">

    <!-- Botón de menú hamburguesa -->
    <label for="check"
        class="p-2 rounded-md hover:bg-gray-700/50 transition-colors cursor-pointer flex items-center"
        aria-label="Toggle Sidebar">
        <i class="fas fa-bars text-xl text-gray-300 hover:text-white transition-colors"></i>
    </label>

    <!-- Sidebar -->
    <div :class="{ '-left-72': !open, 'left-0': open }"
        class="fixed top-0 h-full w-72 bg-gray-800 shadow-lg border-r border-gray-700 transition-all duration-300 ease-in-out z-40">
        <header class="bg-gray-900 text-white text-lg font-semibold tracking-wide py-4 px-6 flex items-center justify-between">
            <span>Menú</span>
            <!-- Cruz para cerrar el sidebar -->
            <label for="check"
                class="cursor-pointer p-1 rounded-md hover:bg-gray-700/50 transition-colors">
                <i class="fas fa-times text-gray-300 text-lg p-1.5 hover:text-white"></i>
            </label>
        </header>

        <ul class="mt-4 px-2 space-y-1">
            <!-- <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <i class="fas fa-qrcode mr-3 text-gray-400 group-hover:text-white"></i>
                    Dashboard
                </a>
            </li> -->
            <li>
                <a href="/catalogo"
                    class="flex items-center px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <i class="fas fa-box mr-3 text-gray-400 group-hover:text-white"></i>
                    Catálogo
                </a>
            </li>
            <li>
                <a href="/cudn"
                    class="flex items-center px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <i class="fas fa-list-alt mr-3 text-gray-400 group-hover:text-white"></i>
                    CUDN
                </a>
            </li>
            <li>
                <a href="/uucc"
                    class="flex items-center px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <i class="fas fa-tools mr-3 text-gray-400 group-hover:text-white"></i>
                    UUCC
                </a>
            </li>
            <li>
                <a href="/materiales"
                    class="flex items-center px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <i class="fa fa-warehouse mr-3 text-gray-400 group-hover:text-white"></i>
                    Materiales
                </a>
            </li>
            <li>
                <a href="/servicios"
                    class="flex items-center px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <i class="fa fa-briefcase mr-3 text-gray-400 group-hover:text-white"></i>
                    Servicios
                </a>
            </li>
            <li class="relative group">
                <a href="#"
                    class="flex items-center justify-between px-4 py-3 text-gray-300 text-sm font-medium rounded-md transition-all duration-200 hover:bg-gray-700/50 hover:text-white group">
                    <span class="flex items-center">
                        <i class="fas fa-handshake mr-3 text-gray-400 group-hover:text-white"></i>
                        Detalles
                    </span>
                    <i class="fas fa-chevron-right text-xs transition-transform duration-200 group-hover:rotate-90"></i>
                </a>
                <ul class="absolute left-full top-0 hidden bg-gray-800 group-hover:block shadow-xl rounded-lg w-60 border border-gray-700">
                    <li>
                        <a href="/detalle-catalogo"
                            class="block py-2.5 px-4 text-gray-300 text-sm transition-all duration-200 hover:bg-gray-700/50 hover:text-white rounded-md">
                            Detalle de Catálogo
                        </a>
                    </li>
                    <li>
                        <a href="/catalogo-uucc"
                            class="block py-2.5 px-4 text-gray-300 text-sm transition-all duration-200 hover:bg-gray-700/50 hover:text-white rounded-md">
                            Catálogo UUCC
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <section class="transition-all duration-300 ease-in-out"
        :class="{ 'ml-72': open, 'ml-0': !open }">
    </section>
</div>