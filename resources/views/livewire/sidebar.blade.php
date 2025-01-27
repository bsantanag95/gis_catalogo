<div x-data="{ open: false }" class="fixed top-0 left-0 h-full z-30">
    <input type="checkbox" id="check" class="hidden" x-model="open">

    <!-- Botón de menú hamburguesa (abre el sidebar) -->
    <label for="check" class="absolute top-4 left-4 cursor-pointer z-30">
        <i class="fas fa-bars text-white bg-[#042331] text-xl p-3 rounded-lg shadow-lg transition-all duration-300"
            :class="{ 'opacity-0 pointer-events-none': open, 'left-4': !open }"></i>
    </label>

    <!-- Sidebar -->
    <div :class="{ '-left-72': !open, 'left-0': open }"
        class="fixed top-0 h-full w-72 bg-[#042331] shadow-2xl transition-all duration-500 ease-in-out rounded-r-2xl">
        <header class="bg-[#063146] text-white text-center text-2xl font-semibold py-5 rounded-tr-2xl">
            App
            <!-- Cruz para cerrar el sidebar -->
            <label for="check" class="absolute top-4 right-4 cursor-pointer">
                <i class="fas fa-times text-[#0a5275] text-2xl p-3 rounded-lg shadow-lg transition-all duration-300 hover:bg-[#0a5275] hover:text-white"></i>
            </label>
        </header>

        <ul class="mt-5 space-y-2">
            <li>
                <a href="#"
                    class="flex items-center px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <i class="fas fa-qrcode mr-4"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="/catalogo"
                    class="flex items-center px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <i class="fas fa-box mr-4"></i> Catálogo
                </a>
            </li>
            <li>
                <a href="/cudn"
                    class="flex items-center px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <i class="fas fa-list-alt mr-4"></i> CUDN
                </a>
            </li>
            <li>
                <a href="/uucc"
                    class="flex items-center px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <i class="fas fa-tools mr-4"></i> UUCC
                </a>
            </li>
            <li>
                <a href="/materiales"
                    class="flex items-center px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <i class="fa fa-warehouse mr-4"></i> Materiales
                </a>
            </li>
            <li>
                <a href="/servicios"
                    class="flex items-center px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <i class="fa fa-briefcase mr-4"></i> Servicios
                </a>
            </li>
            <li class="relative group">
                <a href="#"
                    class="flex items-center justify-between px-6 py-3 text-white text-base font-medium rounded-lg transition-all duration-300 hover:bg-[#0a5275] hover:pl-8">
                    <span>
                        <i class="fas fa-handshake mr-4"></i> Transacciones
                    </span>
                    <i class="fas fa-chevron-right transition-transform duration-300 group-hover:rotate-90"></i>
                </a>
                <ul class="absolute left-full top-0 hidden bg-[#042331] group-hover:block shadow-xl rounded-lg w-60">
                    <li>
                        <a href="/detalle-catalogo"
                            class="block py-3 px-6 text-white transition-all duration-300 hover:bg-[#0a5275] rounded-lg">
                            Detalle de Catálogo
                        </a>
                    </li>
                    <li>
                        <a href="/catalogo-uucc"
                            class="block py-3 px-6 text-white transition-all duration-300 hover:bg-[#0a5275] rounded-lg">
                            Catálogo UUCC
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

    <!-- Contenido principal -->
    <section class="transition-all duration-500 ease-in-out"
        :class="{ 'ml-72': open, 'ml-0': !open }">
    </section>
</div>