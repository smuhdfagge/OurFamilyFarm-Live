@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-earth/20 bg-white text-earth placeholder:text-earth-light/60 focus:border-leaf focus:ring-leaf rounded-xl shadow-sm']) }}>
