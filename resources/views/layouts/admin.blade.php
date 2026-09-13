<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Admin dashboard' }} · {{ config('app.name', 'Our Family Farm') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#f6f3ed] text-earth antialiased">
        <div class="min-h-screen lg:flex">
            <aside class="hidden w-72 shrink-0 flex-col justify-between bg-earth-dark px-6 py-7 text-white lg:flex">
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
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-xl bg-leaf px-3 py-3 text-sm font-bold text-white shadow-lg shadow-black/10">
                            <span class="text-lg">⌂</span><span>Overview</span>
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/10 hover:text-white">
                            <span class="text-lg">✦</span><span>Services</span>
                        </a>
                        <a href="{{ route('gallery-images.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/10 hover:text-white">
                            <span class="text-lg">▧</span><span>Gallery</span>
                        </a>
                        <a href="{{ route('team-members.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/10 hover:text-white">
                            <span class="text-lg">♧</span><span>Team</span>
                        </a>
                        <a href="{{ route('admin.enquiries.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/10 hover:text-white">
                            <span class="text-lg">↗</span><span>Enquiries</span>
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-white/70 transition hover:bg-white/10 hover:text-white">
                            <span class="text-lg">◎</span><span>Users</span>
                        </a>
                    </nav>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                    <p class="text-xs font-bold text-leaf-light">Growing together</p>
                    <p class="mt-2 text-xs leading-5 text-white/55">Keep your farm story fresh and useful for the people you serve.</p>
                </div>
            </aside>

            <div class="min-w-0 flex-1">
                <header class="border-b border-earth/10 bg-[#fbfaf7]/90 px-4 py-4 backdrop-blur sm:px-8">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3 lg:hidden">
                            <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-9 w-12 object-contain">
                            <span class="text-xs font-extrabold tracking-[0.12em] text-earth">OUR FAMILY FARM</span>
                        </div>
                        <div class="hidden lg:block">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-earth-light">Admin workspace</p>
                            <p class="text-sm font-semibold text-earth">Good to see you, {{ Str::before(Auth::user()->name, ' ') }}.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('home') }}" class="hidden rounded-full border border-earth/15 px-4 py-2 text-xs font-bold text-earth transition hover:border-leaf hover:text-leaf-dark sm:inline-flex">View website</a>
                            <a href="{{ route('profile.edit') }}" class="flex h-10 w-10 items-center justify-center rounded-full bg-leaf text-sm font-extrabold text-white" aria-label="Open profile">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</a>
                        </div>
                    </div>
                </header>

                <main class="mx-auto max-w-[1500px] px-4 py-7 sm:px-8 sm:py-10">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>