<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-xl border border-transparent bg-leaf px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-leaf-dark focus:bg-leaf-dark focus:outline-none focus:ring-2 focus:ring-leaf focus:ring-offset-2 focus:ring-offset-cream active:bg-leaf-dark']) }}>
    {{ $slot }}
</button>
