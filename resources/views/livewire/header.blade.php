<header class="sticky top-0 bg-gray-800 text-white shadow-md px-4 sm:px-6 py-2 z-10 flex items-center justify-between h-16">
    <!-- Logo y menú hamburguesa -->
    <div class="flex items-center gap-x-4">
        @livewire('sidebar')
        <span class="text-xl font-bold tracking-tight">
            MyApp
        </span>
    </div>

    <!-- Menú usuario -->
    <div class="flex items-center gap-x-4">
        @auth
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center gap-x-2 group">
                <img
                    src="{{ asset('user_avatar.png') }}"
                    class="w-9 h-9 rounded-full border-2 border-gray-600 hover:border-gray-400 transition-colors"
                    alt="Avatar usuario">

                <div class="hidden lg:flex items-center gap-x-1.5">
                    <span class="text-sm font-medium max-w-[140px] truncate">
                        {{ Auth::user()->username }}
                    </span>
                    <svg class="w-3 h-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>

            <!-- Dropdown -->
            <div x-show="open" @click.away="open = false" x-cloak
                class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-xl border border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-3 text-sm flex items-center gap-x-3 hover:bg-gray-700/50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <a href="/login" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition-colors text-sm font-medium">
            Iniciar sesión
        </a>
        @endguest
    </div>
</header>