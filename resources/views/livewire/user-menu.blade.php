<div class="fixed top-4 right-4 z-20">
    @if(!$isLoggedIn)
    <!-- Botón Iniciar Sesión -->
    <x-button wire:click="toggleLogin">
        Iniciar Sesión
    </x-button>
    @else
    <!-- Menú de Usuario -->
    <div class="relative">
        <x-button>
            Usuario
        </x-button>
        <div class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-md z-10">
            <ul class="py-2">
                <li>
                    <x-button class="w-full text-left" type="button">
                        Perfil
                    </x-button>
                </li>
                <li>
                    <x-button wire:click="toggleLogin" class="w-full text-left">
                        Cerrar Sesión
                    </x-button>
                </li>
            </ul>
        </div>
    </div>
    @endif
</div>