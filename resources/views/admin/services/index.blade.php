<x-admin-layout title="Services management">
    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">Public content</p>
            <h1 class="text-3xl font-black tracking-tight text-earth sm:text-4xl">Services</h1>
            <p class="mt-2 text-sm leading-6 text-earth-light">Manage the services shown on your website.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-leaf px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-leaf-dark"><span class="text-lg">+</span> Add service</a>
    </div>

    @if (session('status'))
        <div class="mb-6 rounded-xl border border-leaf/20 bg-leaf/10 px-4 py-3 text-sm font-bold text-leaf-dark">{{ session('status') }}</div>
    @endif

    <section class="overflow-hidden rounded-2xl border border-earth/10 bg-[#fffdfa] shadow-sm">
        <div class="hidden grid-cols-[1fr_1.4fr_100px_140px] gap-4 border-b border-earth/10 px-6 py-4 text-xs font-bold uppercase tracking-[0.14em] text-earth-light md:grid">
            <span>Service</span><span>Summary</span><span>Order</span><span class="text-right">Actions</span>
        </div>
        @forelse ($services as $service)
            <div class="grid gap-4 border-b border-earth/10 px-5 py-5 last:border-0 md:grid-cols-[1fr_1.4fr_100px_140px] md:items-center md:px-6">
                <div class="flex items-center gap-3">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-leaf/10 text-2xl text-leaf-dark">{{ $service->icon }}</span>
                    <div><p class="font-extrabold text-earth">{{ $service->title }}</p><p class="text-xs text-earth-light">/{{ $service->slug }}</p></div>
                </div>
                <p class="text-sm leading-6 text-earth-light">{{ $service->summary }}</p>
                <p class="text-sm font-bold text-earth">{{ $service->sort_order }}</p>
                <div class="flex items-center gap-3 md:justify-end">
                    <a href="{{ route('admin.services.edit', $service) }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">Edit</a>
                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirm('Remove this service?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm font-bold text-[#b05f50] hover:text-[#8e4135]">Remove</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="px-6 py-14 text-center"><p class="font-bold text-earth">No services yet.</p><p class="mt-1 text-sm text-earth-light">Add the first service to populate the public services page.</p></div>
        @endforelse
    </section>
</x-admin-layout>
