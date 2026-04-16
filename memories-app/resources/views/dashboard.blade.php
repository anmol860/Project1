<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ Auth::user()->name }}'s Memories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="calendar" style="width: 600px; height: 600px; margin: 0 auto;"></div>
                    <p class="mt-12 text-center text-gray-400 italic">
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

            const eventDots = memoryDates.map(date =>{
                return{
                    start: date,
                    display: 'background',
                    color: '#6366f1'
                }
            });

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: eventDots,

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
