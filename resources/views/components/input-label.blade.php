@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-bold text-earth']) }}>
    {{ $value ?? $slot }}
</label>
