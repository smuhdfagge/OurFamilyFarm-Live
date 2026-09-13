<x-admin-layout title="Add gallery image">
    <div class="mb-8"><a href="{{ route('gallery-images.index') }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">← Back to gallery</a><h1 class="mt-4 text-3xl font-black tracking-tight text-earth">Add gallery image</h1><p class="mt-2 text-sm text-earth-light">This image will appear in the public gallery and home page gallery section.</p></div>
    @include('gallery-images.form', ['formAction' => route('gallery-images.store'), 'formMethod' => 'POST'])
</x-admin-layout>