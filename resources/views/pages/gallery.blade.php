<x-site-layout title="Gallery | Our Family Farm Nig. Ltd." description="Browse Our Family Farm Nig. Ltd. gallery of crops, livestock, training, equipment and facilities.">
    <section class="pt-16 pb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading bold="Farm" light="Gallery" />
            <div class="mb-8 flex flex-wrap gap-3">
                @foreach(['All', 'Crops', 'Livestock', 'Training', 'Equipment', 'Facilities'] as $filter)
                    <button class="rounded-full border border-earth/15 bg-white px-4 py-2 text-sm font-semibold text-earth transition hover:bg-earth hover:text-white">{{ $filter }}</button>
                @endforeach
            </div>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                @foreach($images as $image)
                    <div class="group overflow-hidden rounded-[1.75rem] bg-white shadow-sm ring-1 ring-earth/10">
                        <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="h-72 w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy" width="800" height="650" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-site-layout>
