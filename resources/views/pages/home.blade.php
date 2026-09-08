<x-site-layout title="Home | Our Family Farm Nig. Ltd." description="Registered agricultural production and consultancy company in Kano with expertise in crop production, soil analysis, farm management, water analysis, capacity building and farm design.">
    <section class="relative isolate overflow-hidden bg-earth">
        <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1800&q=80" alt="Farm field in Nigeria" class="absolute inset-0 h-full w-full object-cover opacity-50" />
        <div class="absolute inset-0 bg-gradient-to-r from-[#163a1a]/90 via-[#102d1d]/70 to-[#4a2d17]/85"></div>
        <div class="relative mx-auto max-w-7xl px-4 pb-20 pt-16 sm:px-6 lg:px-8 lg:pb-28 lg:pt-20">
            <div class="max-w-3xl" data-reveal>
                <div class="mb-6 inline-flex items-center rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white/90 backdrop-blur-sm">Registered in Nigeria • RC 3301324</div>
                <h1 class="font-display text-4xl font-bold leading-none tracking-tight text-white sm:text-5xl lg:text-7xl">
                    Growing <span class="text-leaf-light">Smarter</span><br>Food Systems
                </h1>
                <p class="mt-6 max-w-xl font-serif text-2xl italic text-leaf-light">From our family farm, to your family pot</p>
                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center rounded-full bg-leaf px-7 py-3.5 text-base font-semibold text-white shadow-lg shadow-leaf/30 transition hover:bg-leaf-dark">Our Services</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full border border-white bg-white/5 px-7 py-3.5 text-base font-semibold text-white backdrop-blur-sm transition hover:bg-white hover:text-earth">Talk to Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] lg:items-center" data-reveal>
            <div>
                <x-section-heading bold="Who" light="We Are" />
                <p class="max-w-2xl text-lg leading-8 text-earth/80">
                    Our Family Farm Nig. Ltd. is a registered Nigerian agricultural production and consultancy company based in Kano with a branch in Hadejia, Jigawa State. We deliver practical farm solutions that improve productivity, strengthen food security, and help partners build resilient agricultural enterprises.
                </p>
                <a href="{{ route('about') }}" class="mt-6 inline-flex items-center text-base font-bold text-leaf-dark hover:text-earth">Read More <span class="ml-2">→</span></a>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl border border-earth/10 bg-white p-6 shadow-sm">
                    <div class="text-4xl font-black text-leaf-dark">2018</div>
                    <p class="mt-2 text-sm font-medium uppercase tracking-[0.2em] text-earth/70">Founded</p>
                </div>
                <div class="rounded-2xl border border-earth/10 bg-white p-6 shadow-sm">
                    <div class="text-4xl font-black text-leaf-dark">8</div>
                    <p class="mt-2 text-sm font-medium uppercase tracking-[0.2em] text-earth/70">Core services</p>
                </div>
                <div class="rounded-2xl border border-earth/10 bg-white p-6 shadow-sm">
                    <div class="text-4xl font-black text-leaf-dark">2</div>
                    <p class="mt-2 text-sm font-medium uppercase tracking-[0.2em] text-earth/70">Locations</p>
                </div>
                <div class="rounded-2xl border border-earth/10 bg-white p-6 shadow-sm">
                    <div class="text-4xl font-black text-leaf-dark">RC</div>
                    <p class="mt-2 text-sm font-medium uppercase tracking-[0.2em] text-earth/70">3301324</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cream py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="Our" light="Services" />
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($services as $service)
                    <article class="group relative overflow-hidden rounded-3xl border border-earth/10 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl" data-reveal>
                        <div class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-leaf transition-transform duration-300 group-hover:scale-x-100"></div>
                        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-leaf/10 text-2xl text-leaf-dark">{{ $service->icon }}</div>
                        <h3 class="text-xl font-bold text-earth">{{ $service->title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-earth/70">{{ $service->summary }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="mt-5 inline-flex items-center text-sm font-bold text-leaf-dark hover:text-earth">Learn more <span class="ml-2">→</span></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-2">
            <div class="rounded-[2rem] bg-cream p-8 shadow-sm ring-1 ring-earth/10" data-reveal>
                <x-section-heading bold="Our" light="Mission" />
                <p class="text-lg leading-8 text-earth/80">Our mission at OUR FAMILY FARM LTD. is to empower agricultural enterprises with innovative, sustainable, and efficient farming solutions. Through expert consultancy, cutting-edge technology, and tailored training programs, we aim to enhance productivity, conserve resources, and promote environmentally responsible farming practices. We are committed to delivering excellence in farm mapping, water conservation, irrigation setup, and overall farm management to ensure the success and growth of our clients' agricultural ventures.</p>
            </div>
            <div class="rounded-[2rem] bg-cream p-8 shadow-sm ring-1 ring-earth/10" data-reveal>
                <x-section-heading bold="Our" light="Vision" />
                <p class="text-lg leading-8 text-earth/80">To be the leading global consultancy firm revolutionizing agriculture by integrating advanced technology, sustainable practices, and expert knowledge. We envision a future where every farm operates at peak efficiency, maximizes resource utilization, and contributes to food security and environmental preservation.</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="Business" light="Strategy" />
            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-full border-2 border-earth p-10 text-center shadow-sm" data-reveal>
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-earth text-xl font-bold text-white">Water</div>
                    <h3 class="mt-5 text-xl font-bold text-earth">Water Management</h3>
                    <p class="mt-3 text-sm leading-7 text-earth/70">Improving irrigation, crop resilience and resource efficiency.</p>
                </div>
                <div class="rounded-full border-2 border-leaf p-10 text-center shadow-sm" data-reveal>
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-leaf text-xl font-bold text-white">Harvest</div>
                    <h3 class="mt-5 text-xl font-bold text-earth">Products Harvesting</h3>
                    <p class="mt-3 text-sm leading-7 text-earth/70">Streamlining production outputs to market-ready quality.</p>
                </div>
                <div class="rounded-full border-2 border-sun p-10 text-center shadow-sm" data-reveal>
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-sun text-xl font-bold text-white">Disease</div>
                    <h3 class="mt-5 text-xl font-bold text-earth">Disease Management</h3>
                    <p class="mt-3 text-sm leading-7 text-earth/70">Protecting productivity with proactive field health planning.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-earth py-16 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] lg:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-leaf-light">Why choose us</p>
                    <h2 class="mt-3 text-3xl font-bold sm:text-4xl">Practical agricultural solutions built for real conditions.</h2>
                </div>
                <div class="rounded-2xl border border-white/15 bg-white/5 p-6 text-base leading-7 text-white/85">
                    We blend technical expertise, field experience, and a family-based commitment to production quality, training, and long-term value creation.
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <x-section-heading bold="Our" light="Team" />
        <div class="grid gap-6 md:grid-cols-3">
            @foreach($team as $member)
                <article class="rounded-[2rem] bg-white p-4 shadow-sm ring-1 ring-earth/10" data-reveal>
                    <div class="relative overflow-hidden rounded-[1.5rem] border-4 border-earth bg-cream p-3">
                        <div class="absolute -bottom-2 right-5 h-8 w-8 bg-leaf"></div>
                        <img src="{{ $member->image ?: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=900&q=80' }}" alt="{{ $member->name }}" class="h-72 w-full rounded-[1.25rem] object-cover" loading="lazy" width="600" height="720" />
                    </div>
                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-earth">{{ $member->name }}</h3>
                        <p class="mt-1 text-sm font-semibold uppercase tracking-[0.14em] text-leaf-dark">{{ $member->role }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-cream py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="Our" light="Gallery" />
            <div class="grid gap-4 md:grid-cols-4">
                @foreach($gallery as $image)
                    <div class="overflow-hidden rounded-2xl shadow-sm" data-reveal>
                        <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="h-64 w-full object-cover transition duration-500 hover:scale-105" loading="lazy" width="600" height="600" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] bg-earth px-6 py-8 text-center text-white shadow-lg sm:px-10 lg:px-12">
            <h2 class="text-3xl font-bold sm:text-4xl">Let’s build a stronger farm future together.</h2>
            <p class="mx-auto mt-4 max-w-2xl text-base leading-7 text-white/80">We partner with institutions, producers, and investors to deliver reliable, scalable, climate-smart agricultural value.</p>
            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center justify-center rounded-full bg-leaf px-7 py-3.5 text-base font-semibold text-white transition hover:bg-leaf-dark">Request a Consultation</a>
        </div>
    </section>
</x-site-layout>
