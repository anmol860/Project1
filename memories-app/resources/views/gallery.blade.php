<script src="https://upload-widget.cloudinary.com/latest/global/all.js" type="text/javascript"></script>

<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg mt-6 text-center">
                <h2 class="text-4xl text-[#e6edf3] mb-6">Your {{ date('d-m-Y', strtotime($date)) }} Memories</h2>

                <form id="uploadForm" action="{{ route('memories.store', $date) }}" method="POST">
                    @csrf
                    <input type="hidden" name="public_id" id="public_id">
                    <input type="hidden" name="media_url" id="media_url">
                    <input type="hidden" name="media_type" id="media_type">

                    <button type="button" id="upload_widget"
                        class="bg-blue-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-600 shadow-xl transition-all hover:scale-105">
                        Upload Memories 📸🎥
                    </button>
                </form>
            </div>
        </div>


        @if($memories->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 w-full">
                <div class="text-center bg-[#161b22] shadow-sm border border-[#30363d] rounded-2xl p-10 max-w-md">
                    <span class="text-5xl mb-4 block">🏝️</span>
                    <h3 class="text-xl font-bold text-[#e6edf3]">No memories found</h3>
                    <p class="text-[#8b949e] mt-2">This date is currently a blank map. Time to start an adventure!</p>
                </div>
            </div>
        @else
            <div class="columns-2 md:columns-3 lg:columns-4 gap-6 space-y-6 mt-8 px-4">
                @foreach($memories as $memory)
                    <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-md">
                        @if($memory->media_type == 'image')
                            <img src="{{ str_replace('/upload','/upload/f_auto/',$memory->media_url) }}"
                                onclick="window.location.href='{{ route('memories.expand', $memory->id) }}'" alt="Travel memory"
                                class="w-full h-auto block object-cover hover:scale-105 transition duration-400">
                        @else
                            @php
                                $thumbUrl = preg_replace('/\.(mp4|mov|webm)$/i', '.jpg', $memory->media_url);
                                $thumbUrl = str_replace('/upload','/upload/f_auto,q_auto/',$thumbUrl);
                            @endphp
                            <div onclick="window.location.href='{{ route('memories.expand', $memory->id) }}'" 
                                 class="relative cursor-pointer hover:scale-105 transition duration-400 group">
                
                            <img src="{{ $thumbUrl }}" alt="Video thumbnail" class="w-full h-auto block object-cover">
                
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition-all duration-300 flex items-center justify-center">
                                <div class="bg-black/60 rounded-full p-4 backdrop-blur-sm shadow-lg transform group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4l12 6-12 6z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script type="text/javascript">
        var myWidget = cloudinary.createUploadWidget({
            cloudName: 'dyrwwdtef',
            uploadPreset: 'snapture_uploads',
            sources: ['local'],
            multiple: false,
            clientAllowedFormats: ['image', 'video'],
            styles: {
                palette: {
                    window: "#101827",
                    windowBorder: "#4b5563",
                    tabIcon: "#60a5fa",
                    menuIcons: "#9ca3af",
                    textDark: "#1f2937",
                    textLight: "#f9fafb",
                    link: "#60a5fa",
                    action: "#3b82f6",
                    inProgress: "#3b82f6",
                    complete: "#10b981",
                    error: "#ef4444",
                    sourceBg: "#1f2937"
                }
            }
        }, (error, result) => {
            if (!error && result && result.event === "success") {
                document.getElementById('public_id').value = result.info.public_id;
                document.getElementById('media_url').value = result.info.secure_url;
                document.getElementById('media_type').value = result.info.resource_type === 'video' ? 'video' : 'image';

                document.getElementById('uploadForm').submit();
            }
        });

        document.getElementById("upload_widget").addEventListener("click", function () {
            myWidget.open();
        }, false);
    </script>

</x-app-layout>