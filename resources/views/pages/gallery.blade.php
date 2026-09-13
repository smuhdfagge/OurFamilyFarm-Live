<x-site-layout title="Farm Gallery | Our Family Farm Nig. Ltd." description="Explore the work and places of Our Family Farm Nig. Ltd.">
    <section
        x-data="galleryLightbox()"
        x-init="setImages(@js($images->values()->map(fn ($image) => ['title' => $image->title, 'category' => $image->category, 'image_url' => $image->image_url, 'description' => $image->description])))"
        @keydown.escape.window="close()"
        @keydown.arrow-left.window="previous()"
        @keydown.arrow-right.window="next()"
        class="mx-auto max-w-7xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8"
    >
        <div class="mb-8 flex items-center justify-between gap-4">
            <h1 class="text-3xl font-black text-earth sm:text-4xl">Farm gallery</h1>
            @auth
                <a href="{{ route('gallery-images.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-earth/15 px-4 py-2.5 text-sm font-bold text-earth transition hover:border-leaf hover:text-leaf-dark">Manage <span aria-hidden="true">↗</span></a>
            @endauth
        </div>

        <div class="mb-6 flex flex-wrap items-center gap-2 border-b border-earth/10 pb-6" aria-label="Filter gallery by category">
            <span class="mr-2 text-xs font-bold uppercase tracking-[0.16em] text-earth-light">Filter</span>
            <a href="{{ route('gallery') }}" class="rounded-full border px-4 py-2 text-sm font-bold transition {{ $activeCategory === 'All' ? 'border-earth bg-earth text-white' : 'border-earth/15 bg-white text-earth hover:border-earth' }}">All</a>
            @foreach ($categories as $category)
                <a href="{{ route('gallery', ['category' => $category]) }}" class="rounded-full border px-4 py-2 text-sm font-bold transition {{ $activeCategory === $category ? 'border-leaf bg-leaf text-white' : 'border-earth/15 bg-white text-earth hover:border-leaf hover:text-leaf-dark' }}">{{ $category }}</a>
            @endforeach
        </div>

        @if ($images->isNotEmpty())
            <div class="grid auto-rows-fr grid-cols-1 items-stretch gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($images as $image)
                    <button
                        type="button"
                        @click="open({{ $loop->index }})"
                        class="group relative block aspect-[4/3] h-full overflow-hidden rounded-2xl bg-cream text-left shadow-sm ring-1 ring-earth/10 focus:outline-none focus:ring-2 focus:ring-leaf focus:ring-offset-4"
                        aria-label="View {{ $image->title }} full screen"
                    >
                        <img src="{{ $image->image_url }}" alt="{{ $image->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy" width="900" height="675">
                        <span class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/65 to-transparent px-5 pb-4 pt-12 text-sm font-bold text-white">{{ $image->title }}</span>
                    </button>
                @endforeach
            </div>
        @else
            <div class="border border-dashed border-earth/20 px-6 py-20 text-center">
                <p class="font-bold text-earth">No gallery images yet.</p>
            </div>
        @endif

        <div
            x-show="isOpen"
            x-cloak
            x-transition.opacity
            class="fixed inset-0 z-[100] flex items-center justify-center bg-earth-dark/95 p-4 sm:p-8"
            role="dialog"
            aria-modal="true"
            aria-label="Image viewer"
            @click.self="close()"
        >
            <button type="button" @click="close()" class="absolute right-4 top-4 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-2xl text-white transition hover:bg-white/20" aria-label="Close image viewer">&times;</button>
            <button type="button" @click="previous()" class="absolute left-3 top-1/2 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 text-3xl text-white transition hover:bg-white/20 sm:left-8" aria-label="Previous image">&#8249;</button>

            <div class="flex max-h-full max-w-6xl flex-col items-center justify-center">
                <img :src="images[current]?.image_url" :alt="images[current]?.title" class="max-h-[75vh] max-w-full rounded-xl object-contain shadow-2xl sm:max-h-[80vh]">
                <div class="mt-4 text-center text-white">
                    <p class="font-bold" x-text="images[current]?.title"></p>
                    <p class="mt-1 text-xs uppercase tracking-[0.16em] text-white/60"><span x-text="images[current]?.category"></span> · <span x-text="`${current + 1} / ${images.length}`"></span></p>
                    <p class="mx-auto mt-2 max-w-xl text-sm text-white/70" x-show="images[current]?.description" x-text="images[current]?.description"></p>
                </div>
            </div>

            <button type="button" @click="next()" class="absolute right-3 top-1/2 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 text-3xl text-white transition hover:bg-white/20 sm:right-8" aria-label="Next image">&#8250;</button>
        </div>
    </section>

    <script>
        function galleryLightbox() {
            return {
                images: [],
                current: 0,
                isOpen: false,
                setImages(images) {
                    this.images = images;
                },
                open(index) {
                    this.current = index;
                    this.isOpen = true;
                    document.body.classList.add('overflow-hidden');
                },
                close() {
                    this.isOpen = false;
                    document.body.classList.remove('overflow-hidden');
                },
                previous() {
                    if (!this.images.length) return;
                    this.current = (this.current - 1 + this.images.length) % this.images.length;
                },
                next() {
                    if (!this.images.length) return;
                    this.current = (this.current + 1) % this.images.length;
                },
            };
        }
    </script>
</x-site-layout>
