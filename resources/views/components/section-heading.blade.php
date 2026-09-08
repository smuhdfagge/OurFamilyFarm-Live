@props(['bold' => 'Our', 'light' => 'Services'])

<div class="mb-10">
    <h2 class="font-display text-3xl md:text-4xl lg:text-[2.7rem] leading-none tracking-tight text-earth">
        <span class="font-bold text-earth">{{ $bold }}</span>
        <span class="ml-2 font-light text-earth/70">{{ $light }}</span>
    </h2>
    <span class="mt-4 block h-1.5 w-28 rounded-full bg-earth"></span>
</div>
