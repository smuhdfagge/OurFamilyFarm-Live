<x-site-layout :title="$service->title . ' | Our Family Farm Nig. Ltd.'" :description="$service->summary">
    <section class="pt-16 pb-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] bg-earth px-6 py-12 text-white shadow-xl md:px-10 lg:px-14">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-leaf-light">Service</p>
                <h1 class="mt-4 font-display text-4xl font-bold leading-none sm:text-5xl">{{ $service->title }}</h1>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
                <article class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-earth/10">
                    <p class="text-lg leading-8 text-earth/80">{{ $service->description }}</p>
                    <h2 class="mt-8 text-2xl font-bold text-earth">What’s included</h2>
                    <ul class="mt-5 space-y-3 text-base text-earth/80">
                        @foreach(['Farm assessment', 'Implementation planning', 'Technical guidance', 'Performance review'] as $item)
                            <li class="flex items-center gap-3"><span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-leaf text-xs font-bold text-white">✓</span>{{ $item }}</li>
                        @endforeach
                    </ul>
                </article>
                <aside class="rounded-[2rem] bg-cream p-8 shadow-sm ring-1 ring-earth/10">
                    <h2 class="text-2xl font-bold text-earth">Need this service?</h2>
                    <p class="mt-3 text-base leading-7 text-earth/80">Speak with our team to discuss your requirements, objectives and field conditions.</p>
                    <a href="{{ route('contact', ['service' => $service->title]) }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-leaf px-6 py-3 text-base font-semibold text-white shadow-sm transition hover:bg-leaf-dark">Request enquiry</a>
                </aside>
            </div>

            <div class="mt-16">
                <h2 class="text-3xl font-bold text-earth">Related services</h2>
                <div class="mt-6 grid gap-6 md:grid-cols-3">
                    @foreach($related as $item)
                        <a href="{{ route('services.show', $item->slug) }}" class="rounded-[2rem] border border-earth/10 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-leaf/10 text-xl text-leaf-dark">{{ $item->icon }}</div>
                            <h3 class="text-xl font-bold text-earth">{{ $item->title }}</h3>
                            <p class="mt-2 text-sm leading-7 text-earth/70">{{ $item->summary }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-site-layout>
