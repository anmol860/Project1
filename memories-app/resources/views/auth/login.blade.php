<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="relative">
            <x-input-label for="email" :value="__('Email')" class="text-[#8b949e] font-semibold tracking-wide text-xs uppercase" />
            <x-text-input id="email" class="block mt-1 w-full bg-[#0d1117]/50 border-gray-700 text-white focus:border-purple-500 focus:ring focus:ring-purple-500/30 rounded-xl shadow-inner transition-all duration-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-6 relative">
            <x-input-label for="password" :value="__('Password')" class="text-[#8b949e] font-semibold tracking-wide text-xs uppercase" />

            <x-text-input id="password" class="block mt-1 w-full bg-[#0d1117]/50 border-gray-700 text-white focus:border-purple-500 focus:ring focus:ring-purple-500/30 rounded-xl shadow-inner transition-all duration-300"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded bg-[#0d1117] border-gray-600 text-purple-500 shadow-sm focus:ring-purple-500/50 transition-colors cursor-pointer" name="remember">
                <span class="ms-2 text-sm text-[#8b949e] group-hover:text-gray-300 transition-colors">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-purple-400 hover:text-pink-400 transition-colors duration-200" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="flex flex-col mt-8 space-y-4">
            
            <button type="submit" class="inline-flex justify-center items-center px-4 py-3.5 bg-gradient-to-r from-pink-300 via-purple-500 to-pink-400 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider shadow-lg hover:shadow-purple-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 w-full">
                {{ __('Log in') }}
            </button>

            <div class="flex items-center my-3">
                <div class="flex-grow border-t border-gray-700"></div>
                <span class="px-4 text-gray-500 text-xs font-semibold uppercase tracking-widest">OR</span>
                <div class="flex-grow border-t border-gray-700"></div>
            </div>

            <a href="{{ route('google.login') }}" class="flex items-center justify-center w-full px-4 py-3.5 text-sm font-bold text-white transition-all duration-200 transform bg-[#ea4335] rounded-xl hover:bg-[#d33426] shadow-lg hover:shadow-[#ea4335]/30 hover:scale-[1.02] active:scale-[0.98]">
                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path>
                </svg>
                Sign in with Google
            </a>
        </div>
    </form>
</x-guest-layout>