@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-300 bg-indigo-500/10 focus:outline-none focus:text-indigo-200 focus:bg-indigo-500/20 focus:border-indigo-300 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#8b949e] hover:text-[#e6edf3] hover:bg-[#21262d] hover:border-[#30363d] focus:outline-none focus:text-[#e6edf3] focus:bg-[#21262d] focus:border-[#30363d] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
