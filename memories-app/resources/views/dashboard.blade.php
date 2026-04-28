<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#e6edf3] leading-tight text-center">
            {{ Auth::user()->name }}'s Memories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#161b22] overflow-hidden shadow-sm sm:rounded-lg border border-[#30363d]">
                <div class="p-6 text-[#e6edf3]">
                    <div id="calendar" class="text-[#e6edf3]"></div>
                    <p class="mt-12 text-center text-[#6e7681] italic">
                        "If you don't take risks, you can't create a future." 🏴‍☠️
                    </p>
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

                dayCellDidMount: function(arg) {
                    const dateStr = arg.date.toISOString().split('T')[0];
                    if (memoryDateSet.has(dateStr)) {
                        arg.el.classList.add('has-memory');
                    }
                },

                dateClick: function(info){
                    const clickedDate = info.dateStr;

                    const baseUrl = "{{ route('memories.show', 'date') }}"
                    const url = baseUrl.replace('date', clickedDate);

                    window.location.href = url;
                }
            });

            calendar.render();

        });
    </script>

</x-app-layout>
