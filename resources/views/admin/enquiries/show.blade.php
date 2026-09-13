<x-admin-layout title="View enquiry">
    <div class="mb-8"><a href="{{ route('admin.enquiries.index') }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">← Back to enquiries</a><h1 class="mt-4 text-3xl font-black tracking-tight text-earth">{{ $enquiry->name }}</h1><p class="mt-2 text-sm text-earth-light">Received {{ $enquiry->created_at->format('F j, Y \a\t g:i A') }}</p></div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-leaf/20 bg-leaf/10 px-4 py-3 text-sm font-bold text-leaf-dark">{{ session('status') }}</div>
    @endif

    <div class="grid max-w-5xl gap-6 lg:grid-cols-[1.35fr_0.65fr]">
        <article class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-6 shadow-sm sm:p-8">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-dark">Message</p>
            <p class="mt-5 whitespace-pre-line text-base leading-8 text-earth/80">{{ $enquiry->message }}</p>
        </article>
        <aside class="space-y-6">
            <section class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-6 shadow-sm">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-dark">Contact details</p>
                <dl class="mt-5 space-y-4 text-sm"><div><dt class="font-bold text-earth-light">Email</dt><dd class="mt-1"><a href="mailto:{{ $enquiry->email }}" class="font-semibold text-leaf-dark hover:text-leaf">{{ $enquiry->email }}</a></dd></div><div><dt class="font-bold text-earth-light">Phone</dt><dd class="mt-1"><a href="tel:{{ $enquiry->phone }}" class="font-semibold text-leaf-dark hover:text-leaf">{{ $enquiry->phone }}</a></dd></div><div><dt class="font-bold text-earth-light">Service</dt><dd class="mt-1 font-semibold text-earth">{{ $enquiry->service ?: 'General enquiry' }}</dd></div></dl>
            </section>
            <section class="rounded-2xl bg-earth p-6 text-white shadow-soft">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-leaf-light">Workflow</p>
                <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}" class="mt-5">
                    @csrf
                    @method('PATCH')
                    <label for="status" class="text-sm font-bold text-white">Status</label>
                    <select id="status" name="status" class="mt-2 w-full rounded-xl border-0 bg-white px-4 py-3 text-sm text-earth focus:ring-2 focus:ring-leaf">@foreach(['new', 'contacted', 'resolved', 'archived'] as $status)<option value="{{ $status }}" @selected($enquiry->status === $status)>{{ ucfirst($status) }}</option>@endforeach</select>
                    <button type="submit" class="mt-3 inline-flex w-full items-center justify-center rounded-xl bg-leaf px-4 py-3 text-sm font-bold text-white hover:bg-leaf-dark">Save status</button>
                </form>
                <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" class="mt-3" onsubmit="return confirm('Remove this enquiry?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full rounded-xl border border-white/20 px-4 py-3 text-sm font-bold text-white/80 hover:bg-white/10 hover:text-white">Remove enquiry</button>
                </form>
            </section>
        </aside>
    </div>
</x-admin-layout>
