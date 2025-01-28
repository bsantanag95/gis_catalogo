<header class="sticky top-0 bg-gray-800 text-white shadow-md px-4 py-2 z-50 flex items-center justify-between min-h-[60px]">
    <!-- Logo / Branding -->
    <div class="flex items-center space-x-4">
        @livewire('sidebar') <!-- Ahora renderiza correctamente -->
        <span class="text-lg font-semibold tracking-wide">
            MyApp
        </span>
    </div>

    <!-- Navigation Links (Optional) -->
    <nav class="hidden md:flex space-x-6">
        <a href="#" class="text-sm font-medium hover:text-gray-300 transition">Home</a>
        <a href="#" class="text-sm font-medium hover:text-gray-300 transition">Features</a>
        <a href="#" class="text-sm font-medium hover:text-gray-300 transition">About</a>
    </nav>

    <!-- User Menu -->
    <div class="relative flex items-center">
        <div class="mr-4">
            <!-- Notification Icon -->
            <button class="p-2 rounded-full hover:bg-gray-700 transition relative" aria-label="Notifications">
                <i class="fas fa-bell text-lg"></i>
                <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full ring-2 ring-gray-800"></span>
            </button>
        </div>
        <!-- User Avatar -->
        <div class="flex items-center space-x-2 cursor-pointer group">
            <img src="https://via.placeholder.com/32" alt="User Avatar" class="w-8 h-8 rounded-full border-2 border-gray-700 group-hover:border-white transition">
            <span class="hidden md:block text-sm font-medium">John Doe</span>
            <i class="fas fa-chevron-down text-sm transition group-hover:rotate-180"></i>
        </div>
    </div>
</header>