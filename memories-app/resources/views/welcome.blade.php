<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Snapture') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v=2">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#0d1117] text-[#c9d1d9] flex items-center justify-center min-h-screen antialiased relative overflow-hidden">
        
        <div class="absolute top-1/2 left-1/2 w-[600px] h-[600px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-full mix-blend-multiply filter blur-[150px] opacity-30 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none z-0"></div>

        <div class="w-full max-w-sm p-6 text-center relative z-10">
            
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('images/logo.png') }}" 
                    alt="App Logo" 
                    class="h-60 w-auto mx-auto drop-shadow-2xl">
                
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 tracking-tight mt-2">
                    Snapture
                </h1>
                <p class="text-[#8b949e] mt-2 mb-10 tracking-widest uppercase text-xs font-semibold animate-pulse">Every memory has a day</p>
            </div>

            @if (Route::has('login'))
                <nav class="flex flex-col gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="w-full px-5 py-3.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white rounded-xl font-bold uppercase tracking-wider shadow-lg hover:shadow-purple-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="w-full px-5 py-3.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white rounded-xl font-bold uppercase tracking-wider shadow-lg hover:shadow-purple-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                            Log in
                        </a>
            
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="w-full px-5 py-3.5 border border-purple-500/50 bg-[#161b22]/50 backdrop-blur-sm text-[#c9d1d9] hover:text-white rounded-xl font-bold uppercase tracking-wider shadow-lg hover:bg-purple-500/10 hover:border-purple-500 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>

    </body>
</html>