<div>
    <a href="{{ route('dashboard') }}" class="mb-12 flex items-center gap-3">
        <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-11 w-14 object-contain">
        <span class="leading-none">
            <span class="block text-sm font-extrabold tracking-[0.12em]">OUR FAMILY</span>
            <span class="mt-1 block text-[10px] font-semibold uppercase tracking-[0.18em] text-white/60">Farm Nig. Ltd.</span>
        </span>
    </a>
    <p class="mb-4 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-white/40">Workspace</p>
    <nav class="space-y-1" aria-label="Admin navigation">
        @foreach ($navItems as $item)
            @php $isActive = request()->routeIs($item['active']); @endphp
            <a href="{{ route($item['route']) }}"
               @if ($isActive) aria-current="page" @endif
               class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm transition {{ $isActive ? 'bg-leaf font-bold text-white shadow-lg shadow-black/10' : 'font-semibold text-white/70 hover:bg-white/10 hover:text-white' }}">
                <span class="w-5 text-center text-lg" aria-hidden="true">{{ $item['icon'] }}</span>
                <span class="flex-1">{{ $item['label'] }}</span>
                @if (! empty($item['badge']))
                    <span class="rounded-full px-2 py-0.5 text-[11px] font-extrabold {{ $isActive ? 'bg-white text-leaf-dark' : 'bg-sun text-earth-dark' }}" title="{{ $item['badge'] }} new">{{ $item['badge'] > 99 ? '99+' : $item['badge'] }}</span>
                @endif
            </a>
        @endforeach
    </nav>
</div>

<div class="mt-10 space-y-3">
    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
        <p class="truncate text-sm font-bold text-white">{{ Auth::user()->name }}</p>
        <p class="truncate text-xs text-white/55">{{ Auth::user()->email }}</p>
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="w-full rounded-xl border border-white/15 px-3 py-2 text-xs font-bold text-white/80 transition hover:bg-white/10 hover:text-white">Sign out</button>
        </form>
    </div>
    <a href="{{ route('home') }}" target="_blank" rel="noopener" class="block px-3 text-xs font-semibold text-leaf-light hover:text-white">View public website ↗</a>
</div>
