<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-xl border border-transparent bg-[#b05f50] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#8e4135] focus:outline-none focus:ring-2 focus:ring-[#b05f50] focus:ring-offset-2']) }}>
    {{ $slot }}
</button>
