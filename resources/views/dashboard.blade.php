<x-admin-layout>
    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">Your farm, at a glance</p>
            <h1 class="text-3xl font-black tracking-tight text-earth sm:text-4xl">Dashboard overview</h1>
            <p class="mt-2 max-w-xl text-sm leading-6 text-earth-light">A calm place to keep your public story, people, and conversations moving.</p>
        </div>
        <a href="{{ route('admin.enquiries.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-earth px-5 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-earth-dark">Review enquiries <span aria-hidden="true">↗</span></a>
    </div>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Content summary">
        @foreach ($stats as $stat)
            <article class="relative overflow-hidden rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold text-earth-light">{{ $stat['label'] }}</p>
                        <p class="mt-3 text-4xl font-black tracking-tight text-earth">{{ number_format($stat['value']) }}</p>
                    </div>
                    <span class="h-3 w-3 rounded-full {{ ['leaf' => 'bg-leaf', 'earth' => 'bg-earth', 'sun' => 'bg-sun', 'berry' => 'bg-[#c87869]'][$stat['tone']] }}"></span>
                </div>
                <p class="mt-4 text-xs font-semibold text-earth-light">{{ $stat['note'] }}</p>
            </article>
        @endforeach
    </section>

    <div class="mt-6 grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
        <section class="rounded-2xl border border-earth/10 bg-[#fffdfa] shadow-sm" aria-labelledby="enquiries-title">
            <div class="flex items-center justify-between border-b border-earth/10 px-5 py-5 sm:px-6">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-dark">Inbox</p>
                    <h2 id="enquiries-title" class="mt-1 text-xl font-extrabold text-earth">Recent enquiries</h2>
                </div>
                <span class="rounded-full bg-cream px-3 py-1 text-xs font-bold text-earth-light">{{ $recentSubmissions->count() }} latest</span>
            </div>
            @forelse ($recentSubmissions as $submission)
                <div class="flex flex-col gap-3 border-b border-earth/10 px-5 py-4 last:border-0 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="truncate text-sm font-extrabold text-earth">{{ $submission->name }}</p>
                            <span class="rounded-full px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide {{ $submission->status === 'new' ? 'bg-leaf/15 text-leaf-dark' : 'bg-earth/10 text-earth-light' }}">{{ $submission->status }}</span>
                        </div>
                        <p class="mt-1 truncate text-xs text-earth-light">{{ $submission->service ?: 'General enquiry' }} · {{ $submission->email }}</p>
                    </div>
                    <time class="shrink-0 text-xs font-semibold text-earth-light" datetime="{{ $submission->created_at->toIso8601String() }}">{{ $submission->created_at->diffForHumans() }}</time>
                </div>
            @empty
                <div class="px-6 py-12 text-center">
                    <p class="text-sm font-bold text-earth">Your inbox is clear.</p>
                    <p class="mt-1 text-xs text-earth-light">New contact submissions will appear here.</p>
                </div>
            @endforelse
        </section>

        <section class="rounded-2xl bg-earth p-6 text-white shadow-soft" aria-labelledby="actions-title">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-light">Keep things fresh</p>
            <h2 id="actions-title" class="mt-2 text-xl font-extrabold">Quick actions</h2>
            <div class="mt-6 space-y-3">
                <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Update services</span><span class="text-leaf-light">→</span></a>
                <a href="{{ route('gallery-images.index') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Manage gallery</span><span class="text-leaf-light">→</span></a>
                <a href="{{ route('team-members.index') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Manage team</span><span class="text-leaf-light">→</span></a>
            </div>
            <div class="mt-8 border-t border-white/15 pt-5 text-xs leading-5 text-white/60">Public pages are connected to the content you manage here.</div>
        </section>
    </div>
</x-admin-layout>
