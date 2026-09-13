<x-admin-layout title="Enquiries management">
    <div class="mb-8 flex flex-col justify-between gap-5 lg:flex-row lg:items-end">
        <div>
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">Customer inbox</p>
            <div class="flex flex-wrap items-end gap-3">
                <h1 class="text-3xl font-black tracking-tight text-earth sm:text-4xl">Enquiries</h1>
                <span class="mb-1 rounded-full bg-leaf/15 px-3 py-1 text-xs font-bold text-leaf-dark">{{ $newCount }} new</span>
            </div>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-earth-light">Stay close to the people reaching out about your farm, services, and partnerships.</p>
        </div>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-earth/15 bg-white px-4 py-3 text-sm font-bold text-earth shadow-sm transition hover:border-leaf hover:text-leaf-dark">View contact page <span aria-hidden="true">↗</span></a>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-leaf/20 bg-leaf/10 px-4 py-3 text-sm font-bold text-leaf-dark">{{ session('status') }}</div>
    @endif

    <section class="mb-6 grid gap-3 sm:grid-cols-2 xl:grid-cols-4" aria-label="Enquiry summary">
        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-earth-light">All enquiries</p><p class="mt-3 text-3xl font-black text-earth">{{ $totalCount }}</p><p class="mt-1 text-xs text-earth-light">Every message received</p></div>
        <div class="rounded-2xl border border-leaf/20 bg-leaf/10 p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-leaf-dark">Needs attention</p><p class="mt-3 text-3xl font-black text-earth">{{ $newCount }}</p><p class="mt-1 text-xs text-earth-light">Waiting for a first response</p></div>
        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-earth-light">In progress</p><p class="mt-3 text-3xl font-black text-earth">{{ $contactedCount }}</p><p class="mt-1 text-xs text-earth-light">Conversations underway</p></div>
        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-earth-light">Resolved</p><p class="mt-3 text-3xl font-black text-earth">{{ $resolvedCount }}</p><p class="mt-1 text-xs text-earth-light">Successfully handled</p></div>
    </section>

    <section class="overflow-hidden rounded-2xl border border-earth/10 bg-[#fffdfa] shadow-sm">
        <div class="border-b border-earth/10 bg-cream/60 px-5 py-5 sm:px-6">
            <form method="GET" action="{{ route('admin.enquiries.index') }}" class="flex flex-col gap-3 md:flex-row">
                <label class="relative min-w-0 flex-1"><span class="sr-only">Search enquiries</span><input type="search" name="q" value="{{ $search }}" placeholder="Search by name, email, service, or message" class="w-full rounded-xl border-earth/15 bg-white px-4 py-3 text-sm text-earth placeholder:text-earth-light/70 focus:border-leaf focus:ring-leaf"></label>
                <label><span class="sr-only">Filter by status</span><select name="status" class="w-full rounded-xl border-earth/15 bg-white px-4 py-3 text-sm font-semibold text-earth focus:border-leaf focus:ring-leaf md:w-44"><option value="">All statuses</option>@foreach(['new', 'contacted', 'resolved', 'archived'] as $option)<option value="{{ $option }}" @selected($status === $option)>{{ ucfirst($option) }}</option>@endforeach</select></label>
                <button type="submit" class="rounded-xl bg-earth px-5 py-3 text-sm font-bold text-white transition hover:bg-earth-dark">Filter</button>
                @if ($search || $status)<a href="{{ route('admin.enquiries.index') }}" class="rounded-xl border border-earth/15 px-5 py-3 text-center text-sm font-bold text-earth transition hover:border-leaf hover:text-leaf-dark">Clear</a>@endif
            </form>
            <p class="mt-3 text-xs font-semibold text-earth-light">Showing {{ $enquiries->count() }} of {{ $enquiries->total() }} matching enquiries</p>
        </div>
        <div class="hidden grid-cols-[1.3fr_1fr_150px_110px_70px] gap-4 border-b border-earth/10 px-6 py-4 text-xs font-bold uppercase tracking-[0.14em] text-earth-light md:grid">
            <span>Contact</span><span>Service</span><span>Received</span><span>Status</span><span></span>
        </div>
        @forelse ($enquiries as $enquiry)
            <div class="grid gap-4 border-b border-earth/10 px-5 py-5 last:border-0 md:grid-cols-[1.3fr_1fr_150px_110px_70px] md:items-center md:px-6">
                <div class="min-w-0"><p class="truncate font-extrabold text-earth">{{ $enquiry->name }}</p><a href="mailto:{{ $enquiry->email }}" class="block truncate text-xs text-leaf-dark hover:text-leaf">{{ $enquiry->email }}</a><p class="mt-2 line-clamp-1 text-xs text-earth-light md:hidden">{{ $enquiry->message }}</p></div>
                <p class="text-sm font-semibold text-earth-light">{{ $enquiry->service ?: 'General enquiry' }}</p>
                <time class="text-sm text-earth-light" datetime="{{ $enquiry->created_at->toIso8601String() }}">{{ $enquiry->created_at->format('M j, Y') }}<span class="block text-xs">{{ $enquiry->created_at->format('g:i A') }}</span></time>
                <span class="w-fit rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide {{ $enquiry->status === 'new' ? 'bg-leaf/15 text-leaf-dark' : ($enquiry->status === 'resolved' ? 'bg-sun/20 text-earth' : 'bg-earth/10 text-earth-light') }}">{{ $enquiry->status }}</span>
                <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="text-sm font-bold text-leaf-dark hover:text-leaf md:text-right">Open <span aria-hidden="true">→</span></a>
            </div>
        @empty
            <div class="px-6 py-14 text-center"><p class="font-bold text-earth">Your inbox is clear.</p><p class="mt-1 text-sm text-earth-light">New contact submissions will appear here.</p></div>
        @endforelse
    </section>

    @if ($enquiries->hasPages())
        <div class="mt-6">{{ $enquiries->links() }}</div>
    @endif
</x-admin-layout>
