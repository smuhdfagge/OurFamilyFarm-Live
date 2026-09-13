<x-admin-layout title="Edit gallery image">
    <div class="mb-8"><a href="{{ route('gallery-images.index') }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">← Back to gallery</a><h1 class="mt-4 text-3xl font-black tracking-tight text-earth">Edit gallery image</h1><p class="mt-2 text-sm text-earth-light">Changes will update both public gallery surfaces.</p></div>
    @include('gallery-images.form', ['formAction' => route('gallery-images.update', $galleryImage), 'formMethod' => 'PUT'])
</x-admin-layout>