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
        <!-- User Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <div @click="open = !open" class="flex items-center space-x-2 cursor-pointer">
                <img src="{{ asset('user_avatar.png') }}"
                    alt="User Avatar"
                    class="w-8 h-8 rounded-full border-2 border-gray-700 transition">
                <span class="hidden md:block text-sm font-medium">{{ Auth::user()->username }}</span>
                <i class="fas fa-chevron-down transition-transform duration-200 ease-in-out"
                    :class="open ? 'rotate-180' : 'rotate-0'"></i>
            </div>
            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 w-48 bg-gray-800 text-white rounded-md shadow-lg overflow-hidden z-50">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-700 transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
        @endauth
        @guest
        <a href="/login" class="text-sm font-medium hover:text-gray-300 transition px-4 py-2 rounded-md bg-gray-700 hover:bg-gray-600">
            Iniciar sesión
        </a>
        @endguest
    </div>
</header>