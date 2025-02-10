<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <x-validation-errors class="mb-4" />
        @session('status')
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ $value }}
        </div>
        @endsession
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900">Bienvenido/a</h2>
            <p class="text-gray-600 mt-2">Inicia sesión para continuar</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="mt-2 space-y-4">
            @csrf

            <!-- Username -->
            <div class="relative">
                <x-label value="{{ __('Usuario') }}" />
                <div class="relative">
                    <x-input
                        class="block w-full mt-1 pl-10 pr-4 py-2 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        type="text"
                        name="username"
                        :value="old('username')"
                        required
                        autofocus />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="7" r="4" />
                            <path d="M5 21c0-4 3-7 7-7s7 3 7 7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="relative">
                <x-label value="{{ __('Contraseña') }}" />
                <div class="relative">
                    <x-input id="password"
                        class="block w-full mt-1 pl-10 pr-12 py-2 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C9.24 2 7 4.24 7 7V10H6C4.9 10 4 10.9 4 12V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V12C20 10.9 19.1 10 18 10H17V7C17 4.24 14.76 2 12 2ZM9 7C9 5.34 10.34 4 12 4C13.66 4 15 5.34 15 7V10H9V7ZM12 17C10.9 17 10 16.1 10 15C10 13.9 10.9 13 12 13C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17Z" />
                        </svg>
                    </div>
                    <button type="button" id="eyeButton" class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zm0 12a5 5 0 110-10 5 5 0 010 10zM10 7a3 3 0 100 6 3 3 0 000-6z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>

                @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-800 transition duration-200" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="mt-6">
                <x-button class="w-full py-2 px-4 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 rounded-lg shadow-lg transform transition hover:scale-105">
                    {{ __('Iniciar sesión') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let passwordInput = document.getElementById("password");
            let eyeButton = document.getElementById("eyeButton");

            eyeButton.addEventListener("mousedown", function() {
                passwordInput.type = "text";
            });

            eyeButton.addEventListener("mouseup", function() {
                passwordInput.type = "password";
            });

            eyeButton.addEventListener("mouseleave", function() {
                passwordInput.type = "password";
            });
        });
    </script>

</x-guest-layout>