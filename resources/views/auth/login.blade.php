<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800 p-4">
        <div class="w-full max-w-md bg-gray-800 rounded-xl shadow-2xl border border-gray-700 p-8 space-y-6 transition-all duration-300 hover:shadow-3xl">
            <div class="flex justify-center">
                <x-authentication-card-logo class="w-16 h-16 text-indigo-500" />
            </div>

            <x-validation-errors class="bg-red-500/20 p-4 rounded-lg text-red-300 text-sm" />

            @session('status')
            <div class="bg-emerald-500/20 p-4 rounded-lg text-emerald-300 text-sm">
                {{ $value }}
            </div>
            @endsession

            <div class="text-center space-y-2">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-blue-400 bg-clip-text text-transparent">
                    Bienvenido/a
                </h2>
                <p class="text-gray-400 text-sm">Inicia sesión para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Username -->
                <div class="space-y-1">
                    <div class="relative group">
                        <x-input
                            class="w-full pl-11 pr-4 py-3 bg-gray-700/50 border-0 rounded-lg text-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:bg-gray-700 transition-all"
                            type="text"
                            name="username"
                            :value="old('username')"
                            required
                            autofocus
                            placeholder="Usuario" />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-400 transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <circle cx="12" cy="7" r="4" />
                                <path d="M5 21c0-4 3-7 7-7s7 3 7 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1">
                    <div class="relative group">
                        <x-input
                            id="password"
                            class="w-full pl-11 pr-12 py-3 bg-gray-700/50 border-0 rounded-lg text-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:bg-gray-700 transition-all"
                            type="password"
                            name="password"
                            required
                            placeholder="Contraseña" />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-400 transition-colors" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C9.24 2 7 4.24 7 7V10H6C4.9 10 4 10.9 4 12V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V12C20 10.9 19.1 10 18 10H17V7C17 4.24 14.76 2 12 2ZM9 7C9 5.34 10.34 4 12 4C13.66 4 15 5.34 15 7V10H9V7ZM12 17C10.9 17 10 16.1 10 15C10 13.9 10.9 13 12 13C13.1 13 14 13.9 14 15C14 16.1 13.1 17 12 17Z" />
                            </svg>
                        </div>
                        <button type="button" id="eyeButton" class="absolute inset-y-0 right-0 flex items-center pr-3 hover:text-indigo-400 transition-colors">
                            <svg id="eyeIcon" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 3C5 3 1.73 7.11 1 10c.73 2.89 4 7 9 7s8.27-4.11 9-7c-.73-2.89-4-7-9-7zm0 12a5 5 0 110-10 5 5 0 010 10zM10 7a3 3 0 100 6 3 3 0 000-6z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Options -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center space-x-2 cursor-pointer">
                        <x-checkbox
                            id="remember_me"
                            name="remember"
                            class="text-indigo-500 border-gray-500 focus:ring-indigo-500" />
                        <span class="text-sm text-gray-400 hover:text-gray-300 transition-colors">Recuérdame</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors">
                        ¿Olvidaste tu contraseña?
                    </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <x-button class="w-full py-3 bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-medium rounded-lg transition-all transform hover:scale-[1.02] shadow-lg">
                    Iniciar sesión
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </x-button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const eyeButton = document.getElementById("eyeButton");
            const eyeIcon = document.getElementById("eyeIcon");

            eyeButton.addEventListener("click", function() {
                const type = passwordInput.type === "password" ? "text" : "password";
                passwordInput.type = type;
                eyeIcon.classList.toggle("text-indigo-400", type === "text");
            });
        });
    </script>
</x-guest-layout>