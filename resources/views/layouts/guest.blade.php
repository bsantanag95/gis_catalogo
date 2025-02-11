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
    @livewireScripts


    <!-- Styles -->
    @livewireStyles
</head>

<body class="@if(request()->routeIs('login')) bg-gradient-to-br from-gray-900 to-gray-800 @else bg-white @endif">
    @if (!request()->routeIs('login'))
    @livewire('header')
    @endif

    <!-- Contenido principal -->

    <main class="p-0">
        <div class="font-sans text-gray-900 antialiased mt-10">
            {{ $slot }}
        </div>
    </main>
    @livewire('wire-elements-modal')
    <x-toaster-hub />

</body>

</html>