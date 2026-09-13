<x-admin-layout title="Users management">
    <div class="mb-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">Workspace access</p>
            <h1 class="text-3xl font-black tracking-tight text-earth sm:text-4xl">Users</h1>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-earth-light">Review the people who can sign in to your farm workspace.</p>
        </div>
        <span class="inline-flex items-center justify-center rounded-xl border border-earth/15 bg-white px-4 py-3 text-sm font-bold text-earth">{{ number_format($totalCount) }} total users</span>
    </div>

    <section class="mb-6 grid gap-3 sm:grid-cols-3" aria-label="User summary">
        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-earth-light">All users</p><p class="mt-3 text-3xl font-black text-earth">{{ number_format($totalCount) }}</p><p class="mt-1 text-xs text-earth-light">Workspace accounts</p></div>
        <div class="rounded-2xl border border-leaf/20 bg-leaf/10 p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-leaf-dark">Verified</p><p class="mt-3 text-3xl font-black text-earth">{{ number_format($verifiedCount) }}</p><p class="mt-1 text-xs text-earth-light">Confirmed email addresses</p></div>
        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-earth-light">Awaiting verification</p><p class="mt-3 text-3xl font-black text-earth">{{ number_format($unverifiedCount) }}</p><p class="mt-1 text-xs text-earth-light">Email confirmation pending</p></div>
    </section>

    <section class="overflow-hidden rounded-2xl border border-earth/10 bg-[#fffdfa] shadow-sm">
        <div class="border-b border-earth/10 bg-cream/60 px-5 py-5 sm:px-6">
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col gap-3 sm:flex-row">
                <label class="relative min-w-0 flex-1"><span class="sr-only">Search users</span><input type="search" name="q" value="{{ $search }}" placeholder="Search by name or email" class="w-full rounded-xl border-earth/15 bg-white px-4 py-3 text-sm text-earth placeholder:text-earth-light/70 focus:border-leaf focus:ring-leaf"></label>
                <button type="submit" class="rounded-xl bg-earth px-5 py-3 text-sm font-bold text-white transition hover:bg-earth-dark">Search</button>
                @if ($search)<a href="{{ route('admin.users.index') }}" class="rounded-xl border border-earth/15 px-5 py-3 text-center text-sm font-bold text-earth transition hover:border-leaf hover:text-leaf-dark">Clear</a>@endif
            </form>
            <p class="mt-3 text-xs font-semibold text-earth-light">Showing {{ $users->count() }} of {{ $users->total() }} matching users</p>
        </div>
        <div class="hidden grid-cols-[1.4fr_1.4fr_150px_150px] gap-4 border-b border-earth/10 px-6 py-4 text-xs font-bold uppercase tracking-[0.14em] text-earth-light md:grid">
            <span>User</span><span>Email</span><span>Status</span><span>Joined</span>
        </div>
        @forelse ($users as $user)
            <div class="grid gap-3 border-b border-earth/10 px-5 py-5 last:border-0 md:grid-cols-[1.4fr_1.4fr_150px_150px] md:items-center md:px-6">
                <div class="flex items-center gap-3"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-leaf text-sm font-extrabold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span><div class="min-w-0"><p class="truncate font-extrabold text-earth">{{ $user->name }}</p><p class="text-xs text-earth-light md:hidden">{{ $user->email }}</p></div></div>
                <a href="mailto:{{ $user->email }}" class="truncate text-sm font-semibold text-leaf-dark hover:text-leaf">{{ $user->email }}</a>
                <span class="w-fit rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide {{ $user->email_verified_at ? 'bg-leaf/15 text-leaf-dark' : 'bg-sun/20 text-earth' }}">{{ $user->email_verified_at ? 'Verified' : 'Pending' }}</span>
                <time class="text-sm text-earth-light" datetime="{{ $user->created_at->toIso8601String() }}">{{ $user->created_at->format('M j, Y') }}</time>
            </div>
        @empty
            <div class="px-6 py-14 text-center"><p class="font-bold text-earth">No users found.</p><p class="mt-1 text-sm text-earth-light">Try a different name or email search.</p></div>
        @endforelse
    </section>

    @if ($users->hasPages())
        <div class="mt-6">{{ $users->links() }}</div>
    @endif
</x-admin-layout>
