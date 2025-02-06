<header class="sticky top-0 bg-gray-800 text-white shadow-md px-4 py-2 z-50 flex items-center justify-between min-h-[60px]">
    <!-- Logo / Branding -->
    <div class="flex items-center space-x-4">
        @livewire('sidebar') <!-- Ahora renderiza correctamente -->
        <span class="text-lg font-semibold tracking-wide">
            MyApp
        </span>
    </div>

    <!-- Navigation Links (Optional) 
    <nav class="hidden md:flex space-x-6">
        <a href="#" class="text-sm font-medium hover:text-gray-300 transition">Home</a>
        <a href="#" class="text-sm font-medium hover:text-gray-300 transition">Features</a>
        <a href="#" class="text-sm font-medium hover:text-gray-300 transition">About</a>
    </nav>-->
    <!-- User Menu -->
    <div class="relative flex items-center">
        @auth
        <div class="mr-4"></div>

        <!-- User Dropdown Container -->
        <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
            <!-- Trigger Button -->
            <button
                @click="open = !open"
                aria-label="Menú de usuario"
                aria-haspopup="true"
                :aria-expanded="open"
                class="flex items-center space-x-2 group focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-300 rounded-full">
                <!-- User Avatar with Fallback -->
                <div class="relative">
                    <img
                        src="{{ asset('user_avatar.png') }}"
                        alt="Avatar de {{ Auth::user()->username }}"
                        class="w-8 h-8 rounded-full border-2 border-gray-700 transition-transform duration-200 group-hover:scale-105"
                        loading="lazy">
                </div>

                <!-- User Info -->
                <div class="hidden md:flex items-center space-x-1.5">
                    <span class="text-sm font-medium truncate max-w-[120px]">
                        {{ Auth::user()->username }}
                    </span>
                    <i class="fas fa-chevron-down text-[0.7rem] transition-transform duration-200 ease-out"
                        :class="open ? 'rotate-180' : 'rotate-0'"></i>
                </div>
            </button>

            <!-- Dropdown Menu -->
            <div
                x-show="open"
                @click.away="open = false"
                x-collapse
                class="absolute right-0 mt-2 w-48 origin-top-right bg-gray-800 rounded-md shadow-xl ring-1 ring-gray-900/5 z-50"
                role="menu">
                <div class="py-1">
                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}" class="w-full" role="none">
                        @csrf
                        <button
                            type="submit"
                            role="menuitem"
                            class="w-full text-left px-4 py-2.5 text-sm flex items-center space-x-2 hover:bg-gray-700/50 active:bg-gray-700 transition-colors duration-150">
                            <i class="fas fa-sign-out-alt text-gray-400 w-4 text-center"></i>
                            <span>Cerrar sesión</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endauth

        @guest
        <!-- Login Button -->
        <a
            href="/login"
            class="text-sm font-medium px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-600 active:bg-gray-500 transition-colors duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-300">
            Iniciar sesión
        </a>
        @endguest
    </div>
</header>