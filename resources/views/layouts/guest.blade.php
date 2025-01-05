<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <header class="sticky top-0 bg-gray-800 text-white shadow-md px-4 py-1 z-50 flex items-center justify-between min-h-[60px]">
        <!-- Sidebar -->
        <div>
            @livewire('sidebar')
        </div>

        <!-- User Menu -->
        <div class="flex-shrink-0">
            @livewire('user-menu')
        </div>
    </header>

    <!-- Contenido principal -->

    <main class="p-6">
        <div class="font-sans text-gray-900 antialiased mt-8">
            {{ $slot }}
        </div>
    </main>
    @livewire('wire-elements-modal')
    @livewireScripts

</body>

</html>