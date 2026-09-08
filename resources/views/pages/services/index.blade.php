<x-site-layout title="Services | Our Family Farm Nig. Ltd." description="Explore Our Family Farm Nig. Ltd. services including crop production, farm management, soil analysis, seed multiplication, water analysis and capacity building.">
    <section class="pt-16 pb-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="Our" light="Services" />
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($services as $service)
                    <article class="group relative overflow-hidden rounded-3xl border border-earth/10 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-leaf transition-transform duration-300 group-hover:scale-x-100"></div>
                        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-leaf/10 text-2xl text-leaf-dark">{{ $service->icon }}</div>
                        <h2 class="text-xl font-bold text-earth">{{ $service->title }}</h2>
                        <p class="mt-3 text-sm leading-7 text-earth/70">{{ $service->summary }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="mt-5 inline-flex items-center text-sm font-bold text-leaf-dark hover:text-earth">Learn more <span class="ml-2">→</span></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-site-layout>
