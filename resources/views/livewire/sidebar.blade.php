<div x-data="{ open: false }" class="fixed top-0 left-0 h-full z-20">
    <input type="checkbox" id="check" class="hidden" x-model="open">

    <!-- Botón de menú hamburguesa (abre el sidebar) -->
    <label for="check" class="absolute top-6 left-10 cursor-pointer z-10">
        <i class="fas fa-bars text-white bg-[#042331] text-2xl p-2 rounded-md transition"
            :class="{ 'opacity-0 pointer-events-none': open, 'left-10': !open }"></i>
    </label>

    <!-- Sidebar -->
    <div :class="{ '-left-64': !open, 'left-0': open }"
        class="fixed top-0 h-full w-64 bg-[#042331] transition-all duration-500 z-20">
        <header class="bg-[#063146] text-white text-center text-xl leading-[70px] relative">
            App
            <!-- Cruz para cerrar el sidebar (dentro del header) -->
            <label for="check" class="absolute top-2 right-2 cursor-pointer">
                <i class="fas fa-times text-[#0a5275] text-2xl p-2 rounded-md transition"></i>
            </label>
        </header>
        <ul class="mt-2">
            <li>
                <a href="#"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fas fa-qrcode mr-4"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="/catalogo"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fas fa-box mr-4"></i> Catálogo
                </a>
            </li>
            <!-- <li>
                <a href="/catalogo-uucc"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fas fa-stream mr-4"></i> Catálogo UUCC
                </a>
            </li> -->
            <li>
                <a href="/cudn"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fas fa-list-alt mr-4"></i> CUDN
                </a>
            </li>
            <li>
                <a href="/uucc"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fas fa-tools mr-4"></i> UUCC
                </a>
            </li>
            <li>
                <a href="/materiales"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fa fa-warehouse mr-4"></i> Materiales
                </a>
            </li>
            <li>
                <a href="/servicios"
                    class="block px-6 py-3 text-white text-sm leading-[55px] border-t border-b border-black/10 hover:pl-12 transition-all">
                    <i class="fa fa-briefcase mr-4"></i> Servicios
                </a>
            </li>
        </ul>

    </div>
    <section class="transition-all duration-500"
        :class="{ 'ml-64': open, 'ml-0': !open }">
    </section>
</div>