<x-admin-layout title="Add team member">
    <div class="mb-8"><a href="{{ route('team-members.index') }}" class="text-sm font-bold text-leaf-dark hover:text-leaf">← Back to team</a><h1 class="mt-4 text-3xl font-black tracking-tight text-earth">Add team member</h1><p class="mt-2 text-sm text-earth-light">This person will appear on the home page and the team page.</p></div>
    @include('team-members.form', ['formAction' => route('team-members.store'), 'formMethod' => 'POST'])
</x-admin-layout>