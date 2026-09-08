<x-site-layout title="About Us | Our Family Farm Nig. Ltd." description="Learn about Our Family Farm Nig. Ltd., our mission, goals, values and processing approach for agriculture production and consultancy in Kano and Hadejia.">
    <section class="pt-16 pb-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="About" light="Us" />
            <div class="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="space-y-6 text-lg leading-8 text-earth/80">
                    <p>Our Family Farm Nig. Ltd. is a registered agricultural production and consultancy company based in Kano, Nigeria, with a branch in Hadejia, Jigawa State. We are driven by the need to improve agricultural productivity, strengthen farmer capability, and support sustainable rural development.</p>
                    <p>We work with individuals, communities, institutions, and value-chain partners to deliver practical solutions in crop production, farm management, soil and water analysis, seed multiplication, and capacity development.</p>
                    <p>Our work is rooted in evidence, field experience, and family values. We believe food systems should be productive, resilient, and accessible to all.</p>
                </div>
                <div class="rounded-[2rem] bg-earth p-8 text-white shadow-lg">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-leaf-light">Company facts</p>
                    <ul class="mt-5 space-y-3 text-base text-white/85">
                        <li>Founded: 2018</li>
                        <li>Registration: RC 3301324</li>
                        <li>Locations: Kano, Hadejia</li>
                        <li>Focus: production + consultancy</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cream py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-earth/10">
                    <x-section-heading bold="Our" light="Mission" />
                    <p class="text-lg leading-8 text-earth/80">Our mission at OUR FAMILY FARM LTD. is to empower agricultural enterprises with innovative, sustainable, and efficient farming solutions. Through expert consultancy, cutting-edge technology, and tailored training programs, we aim to enhance productivity, conserve resources, and promote environmentally responsible farming practices. We are committed to delivering excellence in farm mapping, water conservation, irrigation setup, and overall farm management to ensure the success and growth of our clients' agricultural ventures.</p>
                </div>
                <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-earth/10">
                    <x-section-heading bold="Our" light="Vision" />
                    <p class="text-lg leading-8 text-earth/80">To be the leading global consultancy firm revolutionizing agriculture by integrating advanced technology, sustainable practices, and expert knowledge. We envision a future where every farm operates at peak efficiency, maximizes resource utilization, and contributes to food security and environmental preservation.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <x-section-heading bold="Our" light="Goals" />
        <div class="space-y-4">
            @php $goals = [
                'Develop practical agricultural solutions that improve productivity and sustainability.',
                'Strengthen food security through efficient farm practices and local production.',
                'Support farmer training and professional capacity building across value chains.',
                'Promote soil and water health as the foundation for resilient production.',
                'Improve product quality and market readiness through better management systems.',
                'Foster partnerships with institutions, investors, and farm communities.',
                'Create employment opportunities and encourage agricultural enterprise development.',
            ]; @endphp
            @foreach($goals as $index => $goal)
                <div class="rounded-2xl border border-earth/10 bg-white p-5 shadow-sm" x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }">
                    <button class="flex w-full items-center justify-between text-left" @click="open = !open" aria-expanded="open">
                        <span class="flex items-center gap-4"><span class="flex h-10 w-10 items-center justify-center rounded-full bg-leaf text-sm font-bold text-white">{{ $index + 1 }}</span><span class="text-lg font-bold text-earth">Goal {{ $index + 1 }}</span></span>
                        <span class="text-xl text-earth">+</span>
                    </button>
                    <div x-show="open" x-collapse class="mt-4 pl-14 text-base leading-7 text-earth/80">{{ $goal }}</div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-cream py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="Processing" light="of Products" />
            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-full border-2 border-earth bg-white p-8 text-center shadow-sm">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-earth text-xl font-bold text-white">01</div>
                    <h3 class="mt-5 text-xl font-bold text-earth">Production</h3>
                    <p class="mt-3 text-sm leading-7 text-earth/70">Field-based agricultural production supported by planning and technical oversight.</p>
                </div>
                <div class="rounded-full border-2 border-leaf bg-white p-8 text-center shadow-sm">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-leaf text-xl font-bold text-white">02</div>
                    <h3 class="mt-5 text-xl font-bold text-earth">Processing</h3>
                    <p class="mt-3 text-sm leading-7 text-earth/70">Turning harvested produce into usable, quality-controlled outputs for buyers and households.</p>
                </div>
                <div class="rounded-full border-2 border-sun bg-white p-8 text-center shadow-sm">
                    <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-sun text-xl font-bold text-white">03</div>
                    <h3 class="mt-5 text-xl font-bold text-earth">Distribution</h3>
                    <p class="mt-3 text-sm leading-7 text-earth/70">Ensuring produce reaches consumers, partners and institutions efficiently and reliably.</p>
                </div>
            </div>
        </div>
    </section>
</x-site-layout>
