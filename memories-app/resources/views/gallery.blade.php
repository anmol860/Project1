<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ Auth::user()->name }}'s Memories
        </h2>
    </x-slot>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg mt-6">
                <form action="{{ route('memories.store', $date) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center gap-4">
                    @csrf
                    <label for="media_file" class="text-4xl">Upload Memories</label>

                    <div class="flex flex-col gap-2 w-48 hover:scale-105 transition duration-300">
    
                        <input type="file" name="media_file" accept="image/*,video/*" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2  file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                       
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-6 rounded hover:bg-blue-600 shadow-md">
                            Upload
                        </button>
                    </div>
                </form>
            </div>

         {{--   <div class="columns-1 md:columns-3 lg:columns-4 gap-6 space-y-6 mt-20">
                
                @forelse($memories as $memory)
                    <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-md">
                        @if($memory->media_type == 'image')
                            <img src="{{ $memory->media_url }}" alt="Travel memory" class="w-full h-auto block object-cover hover:scale-105 transition duration-400">
                         @else
                            <video src="{{ $memory->media_url }}" controls class="w-full h-auto block"></video>
                        @endif
                    </div>
                @empty
                    <div class="text-center text-gray-500 shadow-sm sm:rounded-lg p-6">
                        No memories found for this date.
                    </div>
                @endforelse
            </div>  --}}

            @if($memories->isEmpty())
                <div class="flex flex-col items-center justify-center py-20 w-full">
                    <div class="text-center bg-white shadow-sm border border-gray-100 rounded-2xl p-10 max-w-md">
                        <span class="text-5xl mb-4 block">🏝️</span>
                        <h3 class="text-xl font-bold text-gray-800">No memories found</h3>
                        <p class="text-gray-500 mt-2">This date is currently a blank map. Time to start an adventure!</p>
                    </div>
                </div>
            @else
                <div class="columns-1 md:columns-3 lg:columns-4 gap-6 space-y-6 mt-8 px-4">
                    @foreach($memories as $memory)
                        <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-md">
                            @if($memory->media_type == 'image')
                                <img src="{{ $memory->media_url }}" alt="Travel memory" class="w-full h-auto block object-cover hover:scale-105 transition duration-400">
                            @else
                                <video src="{{ $memory->media_url }}" controls class="w-full h-auto block"></video>
                            @endif
                            <form action="{{ route('memories.destroy', $memory->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white font-bold py-2 px-6 rounded hover:bg-red-600 shadow-md">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

</x-app-layout>