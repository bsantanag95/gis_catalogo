<x-guest-layout>

    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CUDN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    </head>

    <body>
        <div class="w-full lg:w-3/4 mx-auto p-1 overflow-x-auto">
            @livewire('cudn.cudn-datatable')
        </div>
    </body>

</x-guest-layout>