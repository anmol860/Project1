<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Snapture') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#0d1117] text-[#e6edf3] flex items-center justify-center min-h-screen antialiased">
        
        <div class="w-full max-w-sm p-6 text-center">
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('images/logo.png') }}" 
                    alt="App Logo" 
                    class="h-60 w-auto mx-auto">
                <h1 class="text-3xl font-bold mt-2 text-white">Snapture</h1>
                <p class="text-[#8b949e] mt-1 mb-10 animate-pulse">Every memory has a day</p>
            </div>

            @if (Route::has('login'))
                <nav class="flex flex-col gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="w-full px-5 py-3 bg-[#238636] text-white rounded-lg font-medium transition hover:scale-105 hover:bg-[#2ea043]">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="w-full px-5 py-3 bg-[#238636] text-white rounded-lg font-medium transition hover:scale-105 hover:bg-[#2ea043]">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="w-full px-5 py-3 border border-[#30363d] text-[#c9d1d9] rounded-lg font-medium transition hover:bg-[#21262d]">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>

    </body>
</html>