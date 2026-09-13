<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Our Family Farm Nig. Ltd.') }}</title>

        <!-- Fonts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-cream font-sans text-earth antialiased">
        <div class="grid min-h-screen lg:grid-cols-[0.9fr_1.1fr]">
            <aside class="relative hidden overflow-hidden bg-earth px-10 py-10 text-white lg:flex lg:flex-col lg:justify-between xl:px-16">
                <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full border-[36px] border-leaf/20"></div>
                <div class="relative">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-14 w-18 object-contain">
                        <span class="leading-none"><span class="block text-sm font-extrabold tracking-[0.12em]">OUR FAMILY</span><span class="mt-1 block text-[10px] font-semibold uppercase tracking-[0.18em] text-white/65">Farm Nig. Ltd.</span></span>
                    </a>
                    <div class="mt-24 max-w-md">
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-leaf-light">Admin workspace</p>
                        <h1 class="mt-5 font-display text-5xl font-bold leading-tight text-white xl:text-6xl">Keep your farm story growing.</h1>
                        <p class="mt-6 max-w-sm text-base leading-8 text-white/70">Manage your services, people, gallery, and enquiries from one calm place.</p>
                    </div>
                </div>
                <p class="relative text-sm italic text-leaf-light">From our family farm, to your family pot.</p>
            </aside>

            <main class="flex min-h-screen flex-col justify-center px-5 py-8 sm:px-10 lg:px-16 xl:px-24">
                <div class="mx-auto w-full max-w-md">
                    <div class="mb-10 lg:hidden">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                            <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-12 w-16 object-contain">
                            <span class="leading-none"><span class="block text-sm font-extrabold tracking-[0.12em] text-earth">OUR FAMILY</span><span class="mt-1 block text-[10px] font-semibold uppercase tracking-[0.18em] text-earth-light">Farm Nig. Ltd.</span></span>
                        </a>
                    </div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
