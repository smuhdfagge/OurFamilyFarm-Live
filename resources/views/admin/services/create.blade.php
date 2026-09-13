<x-admin-layout title="Add service">
    <div class="mb-8"><a href="{{ route('admin.services.index') }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">← Back to services</a><h1 class="mt-4 text-3xl font-black tracking-tight text-earth">Add service</h1><p class="mt-2 text-sm text-earth-light">This service will appear on the public services pages.</p></div>
    @include('admin.services.form', ['formAction' => route('admin.services.store'), 'formMethod' => 'POST'])
</x-admin-layout>
