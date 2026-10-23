<x-admin-layout title="Dashboard">
    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">{{ now()->format('l, j F Y') }}</p>
            <h1 class="text-3xl font-black tracking-tight text-earth sm:text-4xl">Dashboard overview</h1>
            <p class="mt-2 max-w-xl text-sm leading-6 text-earth-light">Everything on the public website, and everyone who has reached out, in one place.</p>
        </div>
        <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-earth px-5 py-3 text-sm font-bold text-white shadow-soft transition hover:bg-earth-dark">Review new enquiries <span aria-hidden="true">→</span></a>
    </div>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4" aria-label="Content summary">
        @foreach ($stats as $stat)
            <a href="{{ route($stat['route'], $stat['query'] ?? []) }}" class="group relative overflow-hidden rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-leaf/40 hover:shadow-soft">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold text-earth-light">{{ $stat['label'] }}</p>
                        <p class="mt-3 text-4xl font-black tracking-tight text-earth">{{ number_format($stat['value']) }}</p>
                    </div>
                    <span class="h-3 w-3 rounded-full {{ ['leaf' => 'bg-leaf', 'earth' => 'bg-earth', 'sun' => 'bg-sun', 'berry' => 'bg-[#c87869]'][$stat['tone']] }}"></span>
                </div>
                <p class="mt-4 flex items-center justify-between text-xs font-semibold text-earth-light"><span>{{ $stat['note'] }}</span><span class="text-leaf-dark opacity-0 transition group-hover:opacity-100" aria-hidden="true">Manage →</span></p>
            </a>
        @endforeach
    </section>

    <div class="mt-6 grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
        <section class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm sm:p-6" aria-labelledby="trend-title">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-dark">Last 14 days</p>
                    <h2 id="trend-title" class="mt-1 text-xl font-extrabold text-earth">Enquiries received</h2>
                </div>
                <div class="flex gap-6 text-right">
                    <div><p class="text-2xl font-black text-earth">{{ $trend['thisWeek'] }}</p><p class="text-xs font-semibold text-earth-light">This week</p></div>
                    <div><p class="text-2xl font-black text-earth-light">{{ $trend['lastWeek'] }}</p><p class="text-xs font-semibold text-earth-light">Week before</p></div>
                </div>
            </div>

            @if ($trend['total'] === 0)
                <div class="mt-6 flex h-40 items-center justify-center rounded-xl bg-cream text-center">
                    <div><p class="text-sm font-bold text-earth">No enquiries in the last two weeks.</p><p class="mt-1 text-xs text-earth-light">New messages from the contact form will show up here.</p></div>
                </div>
            @else
                <div class="mt-6 flex h-40 items-end gap-1.5 sm:gap-2" role="img" aria-label="{{ $trend['total'] }} enquiries over the last 14 days">
                    @foreach ($trend['days'] as $day)
                        @php $height = $day['count'] ? max(6, round($day['count'] / $trend['max'] * 100)) : 2; @endphp
                        <div class="group relative flex h-full flex-1 flex-col justify-end">
                            <span class="pointer-events-none absolute -top-1 left-1/2 z-10 -translate-x-1/2 -translate-y-full whitespace-nowrap rounded-md bg-earth-dark px-2 py-1 text-[11px] font-bold text-white opacity-0 transition group-hover:opacity-100">{{ $day['count'] }} · {{ $day['date']->format('D j M') }}</span>
                            <div class="w-full rounded-t-md {{ $day['count'] ? ($day['date']->isToday() ? 'bg-leaf' : 'bg-leaf/60 group-hover:bg-leaf') : 'bg-earth/10' }} transition" style="height: {{ $height }}%"></div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-2 flex justify-between text-[11px] font-semibold text-earth-light">
                    <span>{{ $trend['days']->first()['date']->format('j M') }}</span>
                    <span>Today</span>
                </div>
            @endif
        </section>

        <section class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm sm:p-6" aria-labelledby="status-title">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-dark">All time</p>
            <h2 id="status-title" class="mt-1 text-xl font-extrabold text-earth">Enquiry status</h2>
            <div class="mt-5 flex h-3 overflow-hidden rounded-full bg-earth/10" aria-hidden="true">
                @foreach ($statusBreakdown as $row)
                    @if ($row['count'])<div class="{{ $row['colour'] }}" style="width: {{ $row['percent'] }}%"></div>@endif
                @endforeach
            </div>
            <ul class="mt-5 space-y-1">
                @foreach ($statusBreakdown as $row)
                    <li>
                        <a href="{{ route('admin.enquiries.index', ['status' => $row['status']]) }}" class="flex items-center justify-between rounded-lg px-2 py-2 text-sm transition hover:bg-cream">
                            <span class="flex items-center gap-2 font-semibold text-earth"><span class="h-2.5 w-2.5 rounded-full {{ $row['colour'] }}"></span>{{ $row['label'] }}</span>
                            <span class="font-bold text-earth">{{ $row['count'] }} <span class="ml-1 text-xs font-semibold text-earth-light">{{ $row['percent'] }}%</span></span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

    <div class="mt-6 grid gap-6 xl:grid-cols-[1.35fr_0.65fr]">
        <section class="rounded-2xl border border-earth/10 bg-[#fffdfa] shadow-sm" aria-labelledby="enquiries-title">
            <div class="flex items-center justify-between border-b border-earth/10 px-5 py-5 sm:px-6">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-dark">Inbox</p>
                    <h2 id="enquiries-title" class="mt-1 text-xl font-extrabold text-earth">Recent enquiries</h2>
                </div>
                <a href="{{ route('admin.enquiries.index') }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">See all →</a>
            </div>
            @forelse ($recentSubmissions as $submission)
                <a href="{{ route('admin.enquiries.show', $submission) }}" class="flex flex-col gap-3 border-b border-earth/10 px-5 py-4 transition last:border-0 hover:bg-cream/70 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="truncate text-sm font-extrabold text-earth">{{ $submission->name }}</p>
                            <span class="rounded-full px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide {{ $submission->status === 'new' ? 'bg-leaf/15 text-leaf-dark' : 'bg-earth/10 text-earth-light' }}">{{ $submission->status }}</span>
                        </div>
                        <p class="mt-1 truncate text-xs text-earth-light">{{ $submission->service ?: 'General enquiry' }} · {{ Str::limit($submission->message, 70) }}</p>
                    </div>
                    <time class="shrink-0 text-xs font-semibold text-earth-light" datetime="{{ $submission->created_at->toIso8601String() }}">{{ $submission->created_at->diffForHumans() }}</time>
                </a>
            @empty
                <div class="px-6 py-12 text-center">
                    <p class="text-sm font-bold text-earth">Your inbox is clear.</p>
                    <p class="mt-1 text-xs text-earth-light">New contact submissions will appear here.</p>
                </div>
            @endforelse
        </section>

        <section class="rounded-2xl bg-earth p-6 text-white shadow-soft" aria-labelledby="actions-title">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-light">Keep things fresh</p>
            <h2 id="actions-title" class="mt-2 text-xl font-extrabold text-white">Quick actions</h2>
            <div class="mt-6 space-y-3">
                <a href="{{ route('gallery-images.create') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Upload farm photos</span><span class="text-leaf-light">+</span></a>
                <a href="{{ route('admin.services.create') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Add a service</span><span class="text-leaf-light">+</span></a>
                <a href="{{ route('team-members.create') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Add a team member</span><span class="text-leaf-light">+</span></a>
                <a href="{{ route('admin.users.create') }}" class="flex items-center justify-between rounded-xl bg-white/10 px-4 py-4 text-sm font-bold transition hover:bg-white/15"><span>Give someone access</span><span class="text-leaf-light">+</span></a>
            </div>
            <div class="mt-8 border-t border-white/15 pt-5 text-xs leading-5 text-white/60">Changes you make here show on the public website straight away.</div>
        </section>
    </div>
</x-admin-layout>
