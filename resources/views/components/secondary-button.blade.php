<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-xl border border-earth/15 bg-white px-5 py-3 text-sm font-bold text-earth shadow-sm transition hover:bg-cream focus:outline-none focus:ring-2 focus:ring-leaf focus:ring-offset-2 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
