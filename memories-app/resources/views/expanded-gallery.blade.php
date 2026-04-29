<x-app-layout>
    <div class="flex flex-col items-center gap-6 px-2">
        <div class="">
            @if($media->media_type == 'image')
                <img src="{{ str_replace('/upload','/upload/f_auto/',$media->media_url) }}" alt="Travel memory"
                    class="w-full h-auto max-h-96 md:h-[512px] lg:h-[768px] mt-10 rounded-2xl block object-cover">
            @else
                <video src="{{ str_replace('/upload','/upload/f_auto,q_auto/',$media->media_url) }}" controls
                    class="w-full h-auto max-h-96 md:h-[512px] lg:h-[768px] mt-10 rounded-2xl block object-cover"></video>
            @endif
        </div>
        <div class="flex gap-8">
            <form action="{{ route('memories.destroy', $media->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 text-white font-bold py-2 px-6 rounded-2xl hover:bg-red-600 hover:scale-105 transition duration-300 shadow-md">
                    Delete
                </button>
            </form>
            <form action="{{ route('memories.download', $media->id) }}" method="GET">
                @csrf
                <button type="submit"
                    class="bg-blue-500 text-white font-bold py-2 px-6 rounded-2xl hover:bg-blue-600 hover:scale-105 transition duration-300 shadow-md">
                    Download
                </button>
            </form>
        </div>

    </div>
</x-app-layout>