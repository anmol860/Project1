<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Snapture') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v=2">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[#c9d1d9] antialiased">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#0d1117] relative overflow-hidden">
            
            <div class="absolute top-0 left-1/2 w-[600px] h-[600px] bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-full mix-blend-lighten filter blur-[150px] opacity-20 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

            <div class="mb-8 relative z-10 mt-4">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-24 mx-auto drop-shadow-2xl">
                    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white to-pink-400 tracking-tight mt-3 text-center">
                        Snapture
                    </h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-10 bg-[#161b22]/90 backdrop-blur-xl shadow-[0_0_50px_rgba(0,0,0,0.6)] sm:rounded-3xl border border-gray-700/50 relative z-10">
                {{ $slot }}
            </div>
            
        </div>
    </body>
</html>