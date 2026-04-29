<nav x-data="{ open: false }" class="bg-[#161b22] border-b border-[#30363d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 -mb-2 w-auto">
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex items-center">
                
                <div class="flex items-center sm:hidden" x-data="{ mobileMenuOpen: false }">
                    <div class="relative">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" @click.away="mobileMenuOpen = false" class="flex items-center gap-2 text-[#e6edf3] px-3 py-1.5 rounded-md">
                            <span class="text-sm font-medium">Options</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="mobileMenuOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-[#161b22] border border-[#30363d] rounded-md shadow-2xl z-50 overflow-hidden"
                             style="display: none;">
                            
                            <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm text-[#e6edf3] hover:bg-[#30363d] border-b border-[#30363d]">{{ __('Dashboard') }}</a>
                            
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-[#e6edf3] hover:bg-[#30363d] border-b border-[#30363d]">{{ __('Profile') }}</a>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-[#ffc8dd] hover:bg-[#30363d]">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#c9d1d9] hover:text-[#e6edf3] focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link class="" :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout')}}">
                                @csrf

                                <x-dropdown-link class="hover:bg-[#ffc8dd] hover:text-black" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                
            </div>
            </div>
    </div>
</nav>