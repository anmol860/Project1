<x-app-layout>
    <div x-data="{ showCreateModal: false }" class="relative overflow-hidden py-12">

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight pb-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-pink-400 hover:scale-105 transition duration-300 inline-block">
                        My Crews
                    </h1>
                    <p class="text-[#8b949e] text-lg font-medium mt-1">
                        Assemble your crew and share adventures together! 🏴‍☠️🌊
                    </p>
                </div>

                <button
                    @click="showCreateModal = true"
                    id="create-crew-btn"
                    class="self-start sm:self-center inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold
                           bg-gradient-to-r from-indigo-500 to-pink-500 text-white
                           shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40
                           hover:scale-105 active:scale-95 transition-all duration-200 cursor-pointer"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    New Crew
                </button>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-bold text-[#e6edf3] mb-6 flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    Your Active Crews
                </h2>

                @if($groups->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @php
                            $stickyColors = [
                                ['bg' => '#fef08a', 'text' => '#713f12', 'shadow' => 'rgba(254,240,138,0.3)', 'pin' => '#eab308'],  // yellow
                                ['bg' => '#bbf7d0', 'text' => '#14532d', 'shadow' => 'rgba(187,247,208,0.3)', 'pin' => '#22c55e'],  // green
                                ['bg' => '#bfdbfe', 'text' => '#1e3a5f', 'shadow' => 'rgba(191,219,254,0.3)', 'pin' => '#3b82f6'],  // blue
                                ['bg' => '#fecdd3', 'text' => '#881337', 'shadow' => 'rgba(254,205,211,0.3)', 'pin' => '#f43f5e'],  // rose
                                ['bg' => '#e9d5ff', 'text' => '#581c87', 'shadow' => 'rgba(233,213,255,0.3)', 'pin' => '#a855f7'],  // purple
                                ['bg' => '#fed7aa', 'text' => '#7c2d12', 'shadow' => 'rgba(254,215,170,0.3)', 'pin' => '#f97316'],  // orange
                                ['bg' => '#a5f3fc', 'text' => '#164e63', 'shadow' => 'rgba(165,243,252,0.3)', 'pin' => '#06b6d4'],  // cyan
                                ['bg' => '#fde68a', 'text' => '#78350f', 'shadow' => 'rgba(253,230,138,0.3)', 'pin' => '#f59e0b'],  // amber
                            ];
                            $rotations = ['-2deg', '1.5deg', '-1deg', '2deg', '-1.5deg', '0.5deg', '-2.5deg', '1deg'];
                        @endphp

                        @foreach ($groups as $index => $group)
                            @php
                                $color = $stickyColors[$index % count($stickyColors)];
                                $rotation = $rotations[$index % count($rotations)];
                            @endphp
                            <a href="{{ route('groups.show', $group->id) }}"
                               class="group block sticky-note"
                               style="--rotation: {{ $rotation }}; --shadow-color: {{ $color['shadow'] }};"
                            >
                                <div class="relative rounded-md p-5 pb-8 min-h-[160px] flex flex-col justify-between transition-all duration-300"
                                     style="background-color: {{ $color['bg'] }}; color: {{ $color['text'] }}; transform: rotate(var(--rotation)); box-shadow: 2px 4px 12px var(--shadow-color), 0 1px 3px rgba(0,0,0,0.08);"
                                >
                                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full border-2 border-white/60 z-10"
                                         style="background-color: {{ $color['pin'] }}; box-shadow: 0 2px 6px rgba(0,0,0,0.25);">
                                    </div>
                                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-4 rounded-b-sm opacity-40"
                                         style="background: {{ $color['pin'] }};"></div>

                                    <div class="mt-3">
                                        <h3 class="text-lg font-bold leading-tight" style="font-family: 'Caveat', 'Figtree', cursive; font-size: 1.4rem;">
                                            {{ $group->name }}
                                        </h3>
                                    </div>

                                    <div class="flex items-center justify-between mt-auto pt-3 opacity-60 group-hover:opacity-100 transition-opacity duration-200">
                                        <span class="text-xs font-medium uppercase tracking-wider">View Calendar</span>
                                        <span class="text-base">📅</span>
                                    </div>
                                    <div class="absolute bottom-0 right-0 w-6 h-6 overflow-hidden">
                                        <div class="absolute bottom-0 right-0 w-0 h-0 border-l-[24px] border-t-[24px] border-l-transparent"
                                             style="border-top-color: rgba(0,0,0,0.08);"></div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="text-6xl mb-4">🏴‍☠️</div>
                        <p class="text-[#8b949e] text-lg">You haven't joined any crews yet!</p>
                        <p class="text-[#6e7681] text-sm mt-1">Click <strong>"New Crew"</strong> to get started.</p>
                    </div>
                @endif
            </div>
        </div>

        <div
            x-show="showCreateModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;"
            @keydown.escape.window="showCreateModal = false"
        >
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showCreateModal = false"></div>

            <div
                x-show="showCreateModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-4"
                class="relative w-full max-w-md bg-[#161b22] border border-[#30363d] rounded-2xl shadow-2xl shadow-black/50 overflow-hidden"
            >
                <div class="h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-[#e6edf3]">Start a New Crew</h2>
                            <p class="text-[#8b949e] text-sm mt-1">Give your crew a name to get started ⚓</p>
                        </div>
                        <button
                            @click="showCreateModal = false"
                            class="text-[#8b949e] hover:text-[#e6edf3] transition-colors p-1 rounded-lg hover:bg-[#30363d] cursor-pointer"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <form method="POST" action="{{ route('groups.create') }}" class="space-y-5">
                        @csrf
                        <div>
                            <x-input-label for="name" value="Crew Name" />
                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="mt-1 block w-full"
                                placeholder="e.g. Straw Hat Pirates"
                                required
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-3 pt-2">
                            <x-primary-button class="flex-1 justify-center">
                                🚀 Form Crew!
                            </x-primary-button>
                            <button
                                type="button"
                                @click="showCreateModal = false"
                                class="px-4 py-2 text-sm font-medium text-[#8b949e] hover:text-[#e6edf3] border border-[#30363d] rounded-lg hover:bg-[#30363d] transition-all duration-200 cursor-pointer"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap');

        .sticky-note > div {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
                        box-shadow 0.3s ease;
        }

        .sticky-note:hover > div {
            transform: rotate(0deg) scale(1.05) translateY(-4px) !important;
            box-shadow: 4px 8px 24px var(--shadow-color), 0 4px 12px rgba(0,0,0,0.15) !important;
        }

        .sticky-note:active > div {
            transform: rotate(0deg) scale(0.98) !important;
        }

        .sticky-note {
            animation: stickyAppear 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) backwards;
        }

        .sticky-note:nth-child(1) { animation-delay: 0.05s; }
        .sticky-note:nth-child(2) { animation-delay: 0.1s; }
        .sticky-note:nth-child(3) { animation-delay: 0.15s; }
        .sticky-note:nth-child(4) { animation-delay: 0.2s; }
        .sticky-note:nth-child(5) { animation-delay: 0.25s; }
        .sticky-note:nth-child(6) { animation-delay: 0.3s; }
        .sticky-note:nth-child(7) { animation-delay: 0.35s; }
        .sticky-note:nth-child(8) { animation-delay: 0.4s; }

        @keyframes stickyAppear {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>
</x-app-layout>