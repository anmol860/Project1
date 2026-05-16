<x-app-layout>
    <div x-data="{ showInviteModal: false }" class="relative overflow-hidden py-12">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight pb-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-pink-400 mb-3 hover:scale-105 transition duration-300">
                🏴‍☠️ {{ $group->name }} - Shared Calendar
            </h1>
            <p class="text-[#8b949e] text-lg max-w-xl mx-auto font-medium">
                Tap any date to relive the crew's journey together! 🌊
            </p>
        </div>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6 px-2">
                    <button
                        @click="showInviteModal = true"
                        id="invite-member-btn"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold
                                bg-gradient-to-r from-indigo-500 to-pink-500 text-white
                                shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40
                                hover:scale-105 active:scale-95 transition-all duration-200 cursor-pointer"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Invite Member
                    </button>

                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-[#8b949e] text-xs font-semibold uppercase tracking-wider mr-1">Members:</span>
                        @foreach ($group->users as $member)
                            @php
                                $avatarColors = ['from-blue-400 to-indigo-500', 'from-pink-400 to-rose-500', 'from-emerald-400 to-teal-500', 'from-amber-400 to-orange-500', 'from-purple-400 to-violet-500', 'from-cyan-400 to-sky-500'];
                                $colorClass = $avatarColors[$loop->index % count($avatarColors)];
                            @endphp
                            <div class="group relative flex items-center gap-2 bg-[#161b22] border border-[#30363d] px-3 py-1.5 rounded-full hover:border-[#58a6ff]/50 transition-all duration-200">
                                <div class="w-6 h-6 rounded-full bg-gradient-to-br {{ $colorClass }} flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium text-[#c9d1d9]">
                                    {{ $member->name }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="overflow-hidden">
                    <div class="p-2 text-[#e6edf3]">
                        <div id="calendar" class="text-[#e6edf3]"></div>
                    </div>
                </div>
            </div>
        </div>

        <div
            x-show="showInviteModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;"
            @keydown.escape.window="showInviteModal = false"
        >
            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="showInviteModal = false"></div>

            <div
                x-show="showInviteModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-4"
                class="relative w-full max-w-md bg-[#161b22] border border-[#30363d] rounded-2xl shadow-2xl shadow-black/50 overflow-hidden"
            >
                <div class="h-1 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500"></div>

                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-[#e6edf3]">Recruit a Nakama! 🦜</h2>
                            <p class="text-[#8b949e] text-sm mt-1">Enter the email of the crew member to invite</p>
                        </div>
                        <button
                            @click="showInviteModal = false"
                            class="text-[#8b949e] hover:text-[#e6edf3] transition-colors p-1 rounded-lg hover:bg-[#30363d] cursor-pointer"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('groups.invite', $group->id) }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <x-input-label for="email" value="Email Address" />
                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="mt-1 block w-full"
                                placeholder="e.g., dilawar@example.com"
                                required
                                autofocus
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-3 pt-2">
                            <x-primary-button class="flex-1 justify-center">
                                🚀 Send Invite
                            </x-primary-button>
                            <button
                                type="button"
                                @click="showInviteModal = false"
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

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const calendarEl = document.getElementById('calendar');

            const memoryDates = @json($memoryDates);

            const memoryDateSet = new Set(memoryDates);

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height:'auto',
                contentHeight: 'auto',

                dayCellDidMount: function(arg) {
                    const dateStr = arg.date.toISOString().split('T')[0];
                    if (memoryDateSet.has(dateStr)) {
                        arg.el.classList.add('has-memory');
                    }
                },

                dateClick: function(info){
                    const clickedDate = info.dateStr;

                    const baseUrl = "{{ route('groups.showGroupMemories', [$group->id, 'date']) }}"
                    const url = baseUrl.replace('date', clickedDate);

                    window.location.href = url;
                }
            });

            calendar.render();

        });
    </script>
</x-app-layout>