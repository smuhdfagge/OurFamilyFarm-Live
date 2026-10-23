@php
    $navItems = [
        ['label' => 'Overview', 'icon' => '⌂', 'route' => 'dashboard', 'active' => 'dashboard'],
        ['label' => 'Services', 'icon' => '✦', 'route' => 'admin.services.index', 'active' => 'admin.services.*'],
        ['label' => 'Gallery', 'icon' => '▧', 'route' => 'gallery-images.index', 'active' => 'gallery-images.*'],
        ['label' => 'Team', 'icon' => '♧', 'route' => 'team-members.index', 'active' => 'team-members.*'],
        ['label' => 'Enquiries', 'icon' => '✉', 'route' => 'admin.enquiries.index', 'active' => 'admin.enquiries.*', 'badge' => $newEnquiryCount ?? 0],
        ['label' => 'Users', 'icon' => '◎', 'route' => 'admin.users.index', 'active' => 'admin.users.*'],
        ['label' => 'My profile', 'icon' => '☺', 'route' => 'profile.edit', 'active' => 'profile.*'],
    ];

    // Breeze profile forms use these codes for their own inline "Saved." notes.
    $statusMessage = session('status');
    if (in_array($statusMessage, ['profile-updated', 'password-updated', 'verification-link-sent'], true)) {
        $statusMessage = null;
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex, nofollow">
        <title>{{ $title ?? 'Admin dashboard' }} · {{ config('app.name', 'Our Family Farm') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#f6f3ed] text-earth antialiased" x-data="{ menuOpen: false }" x-on:keydown.escape.window="menuOpen = false">
        <div class="min-h-screen lg:flex">
            <aside class="sticky top-0 hidden h-screen w-72 shrink-0 flex-col justify-between overflow-y-auto bg-earth-dark px-6 py-7 text-white lg:flex">
                @include('layouts.partials.admin-sidebar')
            </aside>

            {{-- Mobile drawer --}}
            <div x-cloak x-show="menuOpen" class="fixed inset-0 z-40 lg:hidden" role="dialog" aria-modal="true" aria-label="Admin menu">
                <div x-show="menuOpen" x-transition.opacity class="absolute inset-0 bg-earth-dark/60" x-on:click="menuOpen = false"></div>
                <aside x-show="menuOpen"
                       x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                       x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                       class="relative flex h-full w-72 max-w-[85vw] flex-col justify-between overflow-y-auto bg-earth-dark px-6 py-7 text-white">
                    <button type="button" x-on:click="menuOpen = false" class="absolute right-4 top-4 flex h-9 w-9 items-center justify-center rounded-full text-xl text-white/70 hover:bg-white/10 hover:text-white" aria-label="Close menu">×</button>
                    @include('layouts.partials.admin-sidebar')
                </aside>
            </div>

            <div class="min-w-0 flex-1">
                <header class="sticky top-0 z-30 border-b border-earth/10 bg-[#fbfaf7]/90 px-4 py-4 backdrop-blur sm:px-8">
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3 lg:hidden">
                            <button type="button" x-on:click="menuOpen = true" class="flex h-10 w-10 items-center justify-center rounded-xl border border-earth/15 bg-white text-earth" aria-label="Open menu">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
                            </button>
                            <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-9 w-12 object-contain">
                            <span class="hidden text-xs font-extrabold tracking-[0.12em] text-earth sm:inline">OUR FAMILY FARM</span>
                        </div>
                        <div class="hidden lg:block">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-earth-light">Admin workspace</p>
                            <p class="text-sm font-semibold text-earth">Good to see you, {{ Str::before(Auth::user()->name, ' ') ?: Auth::user()->name }}.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('home') }}" target="_blank" rel="noopener" class="hidden rounded-full border border-earth/15 px-4 py-2 text-xs font-bold text-earth transition hover:border-leaf hover:text-leaf-dark sm:inline-flex">View website ↗</a>
                            <a href="{{ route('profile.edit') }}" class="flex h-10 w-10 items-center justify-center rounded-full bg-leaf text-sm font-extrabold text-white" aria-label="Open profile" title="{{ Auth::user()->name }}">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</a>
                        </div>
                    </div>
                </header>

                <main class="mx-auto max-w-[1500px] px-4 py-7 sm:px-8 sm:py-10">
                    @if ($statusMessage)
                        <div x-data="{ show: true }" x-show="show" class="mb-6 flex items-start justify-between gap-4 rounded-xl border border-leaf/20 bg-leaf/10 px-4 py-3 text-sm font-bold text-leaf-dark" role="status">
                            <span>{{ $statusMessage }}</span>
                            <button type="button" x-on:click="show = false" class="text-lg leading-none text-leaf-dark/60 hover:text-leaf-dark" aria-label="Dismiss">×</button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-6 rounded-xl border border-[#b05f50]/20 bg-[#b05f50]/10 px-4 py-3 text-sm font-bold text-[#8e4135]" role="alert">{{ session('error') }}</div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
