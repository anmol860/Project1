<x-app-layout>
    <div class="relative overflow-hidden py-12">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-indigo-500/8 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Profile Header --}}
            <div class="flex flex-col sm:flex-row items-center gap-6 mb-10">
                @php
                    $initials = collect(explode(' ', Auth::user()->name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                @endphp
                <div class="relative group">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center text-white text-3xl font-bold shadow-xl shadow-purple-500/20 group-hover:shadow-purple-500/40 transition-shadow duration-300">
                        {{ $initials }}
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-7 h-7 rounded-full bg-green-500 border-[3px] border-[#0d1117] shadow-sm"></div>
                </div>

                <div class="text-center sm:text-left">
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-pink-400">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-[#8b949e] text-base mt-1 font-medium">
                        {{ Auth::user()->email }}
                    </p>
                    <p class="text-[#6e7681] text-sm mt-1">
                        Member since {{ Auth::user()->created_at->format('M Y') }} · 🏴‍☠️ Adventurer
                    </p>
                </div>
            </div>

            {{-- Sections --}}
            <div class="space-y-6">

                {{-- Profile Information --}}
                <div class="bg-[#161b22] border border-[#30363d] rounded-2xl overflow-hidden shadow-lg hover:border-[#484f58] transition-colors duration-300">
                    <div class="h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="bg-[#161b22] border border-[#30363d] rounded-2xl overflow-hidden shadow-lg hover:border-[#484f58] transition-colors duration-300">
                    <div class="h-1 bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500"></div>
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                {{-- Danger Zone --}}
                <div class="bg-[#161b22] border border-red-900/40 rounded-2xl overflow-hidden shadow-lg hover:border-red-800/50 transition-colors duration-300">
                    <div class="h-1 bg-gradient-to-r from-red-500 via-rose-500 to-red-600"></div>
                    <div class="p-6 sm:p-8">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
