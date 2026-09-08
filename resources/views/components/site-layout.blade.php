<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $description ?? 'Our Family Farm Nig. Ltd. is a registered Nigerian agricultural production and consultancy company helping farmers, agribusinesses, and institutions build productive, resilient agricultural systems.' }}">
        <meta property="og:title" content="{{ $title ?? 'Our Family Farm Nig. Ltd.' }}">
        <meta property="og:description" content="{{ $description ?? 'Agricultural production, farm management, soil analysis, seed multiplication and consultancy for Nigeria.' }}">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('logo.png') }}">
        <meta name="twitter:card" content="summary_large_image">
        <title>{{ $title ?? 'Our Family Farm Nig. Ltd.' }}</title>
        <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-cream text-earth antialiased selection:bg-leaf selection:text-white">
        <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[200] focus:bg-white focus:px-4 focus:py-2 focus:rounded-md focus:text-earth">Skip to content</a>
        <header x-data="{ open: false }" class="sticky top-0 z-50 bg-white/95 shadow-sm backdrop-blur transition-shadow duration-300">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-20 items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-11 w-14 object-contain">
                        <span class="flex items-center gap-3">
                            <span class="flex flex-col leading-none">
                                <span class="font-sans text-sm font-extrabold tracking-[0.12em] text-earth">OUR FAMILY</span>
                                <span class="font-sans text-xs font-semibold uppercase tracking-[0.22em] text-earth/70">FARM NIG. LTD.</span>
                            </span>
                            <span class="hidden h-8 w-px bg-leaf lg:block"></span>
                        </span>
                    </a>

                    <nav class="hidden items-center gap-8 lg:flex">
                        <a href="{{ route('home') }}" class="text-sm font-semibold text-earth hover:text-leaf-dark transition-colors">Home</a>
                        <a href="{{ route('about') }}" class="text-sm font-semibold text-earth hover:text-leaf-dark transition-colors">About</a>
                        <a href="{{ route('services.index') }}" class="text-sm font-semibold text-earth hover:text-leaf-dark transition-colors">Services</a>
                        <a href="{{ route('gallery') }}" class="text-sm font-semibold text-earth hover:text-leaf-dark transition-colors">Gallery</a>
                        <a href="{{ route('our-team') }}" class="text-sm font-semibold text-earth hover:text-leaf-dark transition-colors">Our Team</a>
                        <a href="{{ route('contact') }}" class="text-sm font-semibold text-earth hover:text-leaf-dark transition-colors">Contact</a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center rounded-full bg-leaf px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-leaf-dark">Talk to Us</a>
                    </nav>

                    <button @click="open = true" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-earth/20 bg-white/60 text-earth shadow-sm lg:hidden" aria-label="Open menu">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
                    </button>
                </div>
            </div>

            <div x-show="open" x-transition.opacity @click.outside="open = false" class="fixed inset-0 z-50 bg-earth/40 backdrop-blur-sm lg:hidden" x-cloak>
                <aside x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="translate-x-full opacity-0" class="ml-auto flex h-full w-full max-w-xs flex-col bg-white p-6 shadow-2xl">
                    <div class="mb-8 flex items-center justify-between">
                        <span class="text-lg font-black tracking-wide text-earth">Menu</span>
                        <button @click="open = false" class="rounded-full border border-earth/20 p-2 text-earth" aria-label="Close menu">✕</button>
                    </div>
                    <nav class="space-y-3">
                        <a @click="open = false" href="{{ route('home') }}" class="block rounded-xl px-3 py-3 text-base font-semibold text-earth transition hover:bg-cream">Home</a>
                        <a @click="open = false" href="{{ route('about') }}" class="block rounded-xl px-3 py-3 text-base font-semibold text-earth transition hover:bg-cream">About</a>
                        <a @click="open = false" href="{{ route('services.index') }}" class="block rounded-xl px-3 py-3 text-base font-semibold text-earth transition hover:bg-cream">Services</a>
                        <a @click="open = false" href="{{ route('gallery') }}" class="block rounded-xl px-3 py-3 text-base font-semibold text-earth transition hover:bg-cream">Gallery</a>
                        <a @click="open = false" href="{{ route('our-team') }}" class="block rounded-xl px-3 py-3 text-base font-semibold text-earth transition hover:bg-cream">Our Team</a>
                        <a @click="open = false" href="{{ route('contact') }}" class="block rounded-xl px-3 py-3 text-base font-semibold text-earth transition hover:bg-cream">Contact</a>
                    </nav>
                </aside>
            </div>
        </header>

        <main id="main-content">
            {{ $slot }}
        </main>

        <footer class="bg-earth text-white">
            <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                <div class="grid gap-10 md:grid-cols-3">
                    <div>
                        <div class="mb-4 flex items-center gap-3">
                            <img src="{{ asset('logo.png') }}" alt="Our Family Farm Nig. Ltd. logo" class="h-11 w-14 object-contain">
                            <div>
                                <p class="text-xs font-bold tracking-[0.2em] text-white/80">OUR FAMILY</p>
                                <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-white/80">FARM NIG. LTD.</p>
                            </div>
                        </div>
                        <p class="max-w-sm text-sm leading-7 text-white/85">We grow resilient agricultural systems and practical farming knowledge that help communities, institutions, and producers thrive.</p>
                    </div>
                    <div>
                        <h3 class="mb-4 text-lg font-bold text-white">Quick links</h3>
                        <ul class="space-y-2 text-sm text-white/85">
                            <li><a href="{{ route('about') }}" class="hover:text-leaf-light">About us</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-leaf-light">Services</a></li>
                            <li><a href="{{ route('gallery') }}" class="hover:text-leaf-light">Gallery</a></li>
                            <li><a href="{{ route('our-team') }}" class="hover:text-leaf-light">Our Team</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-leaf-light">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="mb-4 text-lg font-bold text-white">Contact</h3>
                        <ul class="space-y-2 text-sm text-white/85">
                            <li>{{ config('company.phone') }}</li>
                            <li>{{ config('company.email') }}</li>
                            <li>{{ config('company.head_office.address') }}</li>
                            <li>{{ config('company.branch_office.address') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-10 border-t border-white/15 pt-6 text-sm text-white/75">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <p>© {{ date('Y') }} Our Family Farm Nig. Ltd. RC 3301324</p>
                        <p class="font-serif italic text-base text-leaf-light">From our family farm, to your family pot</p>
                    </div>
                </div>
            </div>
        </footer>

        <a href="https://wa.me/2348058061627" target="_blank" rel="noopener" aria-label="Chat on WhatsApp" class="fixed bottom-5 right-5 z-50 inline-flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg transition hover:scale-105">
            <svg aria-hidden="true" viewBox="0 0 24 24" class="h-7 w-7 fill-current"><path d="M20.5 3.5C18.4 1.4 15.6 0.5 12.8 0.5A11.1 11.1 0 0 0 1.7 12.1c-.7 2.4-.1 5 .9 7.1L1 23l3.9-1c2.1 1.1 4.4 1.7 6.8 1.7h.1c3.2 0 6.1-1.1 8.3-3.2 2.2-2.1 3.3-5 3.3-8.1 0-2.8-.9-5.3-2.9-7.3ZM12.8 20.3c-2 0-4-.6-5.7-1.7l-.4-.2-2.3.6.6-2.2-.3-.5A8.9 8.9 0 0 1 3.7 12c0-2.5.9-4.8 2.7-6.6a9 9 0 0 1 6.4-2.7c2.3 0 4.5.9 6.1 2.4 1.6 1.6 2.5 3.8 2.5 6.1 0 4.5-3.6 8.1-8.1 8.1Zm4.5-6.1c-.2-.1-1.4-.7-1.7-.8-.2-.1-.4-.1-.6.1-.2.2-.7.8-.8 1-.1.1-.2.1-.4.1s-.9-.3-1.7-.9c-.6-.5-1-1.2-1.1-1.4-.1-.2 0-.3.1-.4l.3-.4c.1-.1.1-.2.2-.4.1-.1 0-.3 0-.4 0-.1-.6-1.5-.8-2.1-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 1.9s.8 2.2.9 2.3c.1.1 1.6 2.5 3.9 3.5.5.2.9.3 1.2.4.6.2 1.1.2 1.5.1.5-.1 1.4-.6 1.6-1.1.3-.6.3-1 .2-1.1-.1-.1-.2-.2-.4-.3Z"/></svg>
        </a>

        @livewireScripts
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('revealed');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.18 });

                document.querySelectorAll('[data-reveal]').forEach((el) => observer.observe(el));
            });
        </script>
    </body>
</html>
