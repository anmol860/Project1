@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#c9d1d9]']) }}>
    {{ $value ?? $slot }}
</label>
