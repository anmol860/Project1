@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-[#0d1117] border-[#30363d] text-[#e6edf3] focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm placeholder-[#6e7681]']) }}>
