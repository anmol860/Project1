<x-app-layout>

    <div class="relative overflow-hidden py-12">
    
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight pb-2 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-indigo-400 to-pink-400 mb-3 hover:scale-105 transition duration-300">
            {{ Auth::user()->name }}'s Memories
        </h1>
        
        <p class="text-[#8b949e] text-lg max-w-xl mx-auto font-medium">
            Your personal logbook of adventures. Tap any date to relive the journey! 🏴‍☠️🌊
        </p>

    </div>
</div>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-2 text-[#e6edf3]">
                    <div id="calendar" class="text-[#e6edf3]"></div>

                    @php
                    $quotes = [
                                "\"I'm going to be the Pirate King!\" 👑",
                                "\"When do you think people die? When they are forgotten.\" 🌸",
                                "\"Fools who don't respect the past are likely to repeat it.\" 📜",
                                "\"There comes a time when a man has to stand and fight!\" ⚔️",
                                "\"Whatever you do, don't be sorry for being born.\" ⚓",
                                "\"Destiny. Fate. Dreams. These unstoppable ideas are held deep in the heart.\" 🌊",
                                "\"I want to live!\" 🗣️",
                                "\"Power isn't determined by your size, but the size of your heart and dreams.\" 🌟",
                                "\"Scars on the back are a swordsman's shame.\" 🗡️",
                                "\"A man's dream will never die!\" ☠️",
                                "\"I don't want to conquer anything. I just think the guy with the most freedom in this entire ocean is the Pirate King.\" ⛵",
                                "\"Wake up to reality! Nothing ever goes as planned in this world.\" 🌙",
                                "\"If you win, you live. If you lose, you die. If you don't fight, you can't win.\" 🧣",
                                "\"Hard work is worthless for those that don’t believe in themselves.\" 🍜",
                                "\"Fear is not evil. It tells you what your weakness is.\" 🛡️",
                                "\"Sometimes you must hurt in order to know, fall in order to grow.\" 🍂",
                                "\"Knowing you're different is only the beginning.\" ⚡",
                                "\"A dropout will beat a genius through hard work.\" 🥊",
                                "\"The world isn't perfect. But it's there for us, doing the best it can.\" 🌍",
                                "\"If you only face forward, there is something you will miss seeing.\" 🚲",
                                "\"Simplicity is the easiest path to true beauty.\" 🌸",
                                "\"You need to accept the fact that you’re not the best and have all the will to strive to be better.\" 🏐",
                                "\"A lesson without pain is meaningless.\" 🦾",
                                "\"To defeat evil, I shall become an even greater evil.\" 🦅",
                                "\"A future is something that you make yourself.\" ⏳",
                                "\"Whatever you lose, you'll find it again.\" 🛤️",
                                "\"The ticket to the future is always open.\" 🎫",
                                "\"We are all like fireworks. We climb, shine and always go our separate ways.\" 🎆",
                                "\"Life is not a game of luck. If you wanna win, work hard.\" 🎲",
                                "\"Don't give up, there's no shame in falling down!\" 🧗",
                                "\"Even if I die, I will keep that promise.\" 🤞",
                                "\"You can die anytime, but living takes true courage.\" 🦁",
                                "\"Justice will prevail, you say? But of course it will! Whoever wins this war becomes justice!\" ⚖️",
                                "\"Miracles only happen to those who never give up.\" 💫",
                                "\"Your first 10,000 photographs are your worst.\" 📷",
                                "\"Photography is the story I fail to put into words.\" 🖼️",
                                "\"What I like about photographs is that they capture a moment that’s gone forever.\" ⏳",
                                "\"A good snapshot keeps a moment from running away.\" 🏃",
                                "\"The camera is an instrument that teaches people how to see without a camera.\" 👁️",
                                "\"Taking pictures is savoring life intensely, every hundredth of a second.\" ⏱️",
                                "\"There are always two people in every picture: the photographer and the viewer.\" 👯",
                                "\"A tear contains an ocean. A photographer is aware of the tiny moments.\" 💧",
                                "\"To me, photography is an art of observation.\" 🔍",
                                "\"The best thing about a picture is that it never changes, even when the people in it do.\" 🎞️",
                                "\"Photography takes an instant out of time, altering life by holding it still.\" ⏸️",
                                "\"We are making photographs to understand what our lives mean to us.\" 💡",
                                "\"Photography is an austere and blazing poetry of the real.\" 🔥",
                                "\"It is an illusion that photos are made with the camera… they are made with the eye, heart and head.\" ❤️",
                                "\"A photograph is a secret about a secret. The more it tells you the less you know.\" 🤫",
                                "\"Look and think before opening the shutter.\" 🤔",
                                "\"Character, like a photograph, develops in darkness.\" 🌑",
                                "\"The picture that you took with your camera is the imagination you want to create with reality.\" 🌌",
                                "\"Photography can only represent the present. Once photographed, the subject becomes part of the past.\" 🕰️",
                                "\"When words become unclear, I shall focus with photographs.\" 🔭",
                                "\"Great photography is about depth of feeling, not depth of field.\" 🌊",
                                "\"Photography deals exquisitely with appearances, but nothing is what it appears to be.\" 🎭",
                                "\"Don’t pack up your camera until you’ve left the location.\" 🎒",
                                "\"A portrait is not made in the camera but on either side of it.\" 🧑‍🤝‍🧑",
                                "\"My life is shaped by the urgent need to wander and observe, and my camera is my passport.\" 🛂",
                                "\"Every artist has a central story to tell, and the difficulty, the impossible task, is trying to present that story in pictures.\" 🎨",
                                "\"Only photograph what you love.\" 💖",
                                "\"Contrast is what makes photography interesting.\" 🌗",
                                "\"In photography there is a reality so subtle that it becomes more real than reality.\" 🌀",
                                "\"Light makes photography. Embrace light. Admire it. Love it.\" ☀️",
                                "\"You don't take a photograph, you make it.\" 🛠️",
                                "\"The earth is art, the photographer is only a witness.\" 🌍",
                                "\"Photography is a way of feeling, of touching, of loving.\" 🫂",
                                "\"Not all those who wander are lost.\" 🧭",
                                "\"The world is a book, and those who do not travel read only one page.\" 📖",
                                "\"Travel makes one modest. You see what a tiny place you occupy in the world.\" 🐜",
                                "\"To travel is to discover that everyone is wrong about other countries.\" 🗺️",
                                "\"Take only memories, leave only footprints.\" 👣",
                                "\"Travel is fatal to prejudice, bigotry, and narrow-mindedness.\" 🚫",
                                "\"Adventure is worthwhile in itself.\" 🏔️",
                                "\"A journey of a thousand miles begins with a single step.\" 🚶",
                                "\"Once a year, go someplace you’ve never been before.\" ✈️",
                                "\"We travel not to escape life, but for life not to escape us.\" 🏃‍♀️",
                                "\"I haven’t been everywhere, but it’s on my list.\" 📝",
                                "\"Traveling – it leaves you speechless, then turns you into a storyteller.\" 🗣️",
                                "\"Man cannot discover new oceans unless he has the courage to lose sight of the shore.\" ⛵",
                                "\"A good traveler has no fixed plans and is not intent on arriving.\" 🛤️",
                                "\"Wherever you go becomes a part of you somehow.\" 🧩",
                                "\"Jobs fill your pocket, but adventures fill your soul.\" 🎒",
                                "\"Travel far enough, you meet yourself.\" 🪞",
                                "\"The biggest adventure you can take is to live the life of your dreams.\" ✨",
                                "\"Life is either a daring adventure or nothing at all.\" 🦁",
                                "\"Don't listen to what they say. Go see.\" 👀",
                                "\"To awaken quite alone in a strange town is one of the pleasantest sensations in the world.\" 🌅",
                                "\"Travel brings power and love back into your life.\" ❤️",
                                "\"The journey not the arrival matters.\" 🚂",
                                "\"Better to see something once than hear about it a thousand times.\" 👂",
                                "\"Oh the places you'll go.\" 🎈",
                                "\"Investment in travel is an investment in yourself.\" 📈",
                                "\"He who would travel happily must travel light.\" 🪶",
                                "\"Every exit is an entry somewhere else.\" 🚪",
                                "\"Wandering re-establishes the original harmony which once existed between man and the universe.\" 🌌",
                                "\"It feels good to be lost in the right direction.\" 🧭",
                                "\"We wander for distraction, but we travel for fulfillment.\" 🧘",
                                "\"Stop worrying about the potholes in the road and enjoy the journey.\" 🚙",
                                "\"Let the adventure begin!\" 🎉"
                                ];

                            $randomQuote = $quotes[array_rand($quotes)];
                            @endphp

                    <div class="mt-8 mb-6 flex justify-center w-full">
                        <p class="text-[#8b949e] text-center italic font-medium tracking-wide hover:text-[#e6edf3] transition duration-300">
                            {{ $randomQuote }}
                        </p>
                        </div>
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

                    const baseUrl = "{{ route('memories.show', 'date') }}"
                    const url = baseUrl.replace('date', clickedDate);

                    window.location.href = url;
                }
            });

            calendar.render();

        });
    </script>

</x-app-layout>
