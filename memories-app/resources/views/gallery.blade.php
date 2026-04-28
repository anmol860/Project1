<x-app-layout>
    


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg mt-6">
                <form action="{{ route('memories.store', $date) }}" method="POST" enctype="multipart/form-data" id="uploadForm" class="flex flex-col items-center gap-4">
                    @csrf
                    <label for="media_file" class="text-4xl text-[#e6edf3]">Upload Memories</label>

                    <div class="flex flex-col gap-2 w-48 hover:scale-105 transition duration-300">
    
                        <input type="file" name="media_file" accept="image/*,video/*" 
                            class="block w-full text-sm text-[#8b949e] file:mr-4 file:py-2 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#21262d] file:text-[#58a6ff] hover:file:bg-[#30363d]" required>
                       
                        <button type="submit" id="submitBtn" class="bg-blue-500 text-white font-bold py-2 px-6 rounded hover:bg-blue-600 shadow-md">
                            Upload
                        </button>
                    </div>
                    <div id="progressWrapper" class="hidden flex flex-col items-center justify-center mt-6">
    <div class="relative size-40">
        <svg class="size-full -rotate-90" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-[#21262d]" stroke-width="2"></circle>
            
            <circle id="progressBar" cx="18" cy="18" r="16" fill="none" 
                class="stroke-current text-blue-500 transition-all duration-300" 
                stroke-width="2" 
                stroke-dasharray="100" 
                stroke-dashoffset="100" 
                stroke-linecap="round"></circle>
        </svg>

        <div class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
            <span id="progressText" class="text-center text-2xl font-bold text-blue-500">0%</span>
        </div>
    </div>
    <p id="statusMessage" class="text-xs text-[#8b949e] mt-4 font-semibold animate-pulse">Uploading to Snapture... 🚀</p>
</div>
                </form>
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
                                <img src="{{ $memory->media_url }}" onclick="window.location.href='{{ route('memories.expand', $memory->id) }}'" alt="Travel memory" class="w-full h-auto block object-cover hover:scale-105 transition duration-400">
                            @else
                                <video src="{{ $memory->media_url }}" onclick="window.location.href='{{ route('memories.expand', $memory->id) }}'" controls class="w-full h-auto block"></video>
                            @endif
                            
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadForm = document.getElementById('uploadForm');
    
    if(uploadForm) {
        uploadForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            const form = this;
            const formData = new FormData(form);
            const progressWrapper = document.getElementById('progressWrapper');
            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            const submitBtn = document.getElementById('submitBtn');
            const statusMessage = document.getElementById('statusMessage');

            progressWrapper.classList.remove('hidden');
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);

            xhr.upload.onprogress = function(event) {
                if (event.lengthComputable) {
                    const percentComplete = Math.round((event.loaded / event.total) * 100);
                    
                    const offset = 100 - percentComplete;
                    progressBar.style.strokeDashoffset = offset;
                    
                    progressText.innerText = percentComplete + '%';

                    if (percentComplete === 100) {
                        statusMessage.innerText = 'Saving to Cloud... ☁️';
                    }
                }
            };

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    window.location.reload();
                } else {
                    alert('Upload failed! Check your PHP limits.');
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-50');
                    progressWrapper.classList.add('hidden');
                }
            };

            xhr.send(formData);
        });
    }
});
</script>

</x-app-layout>