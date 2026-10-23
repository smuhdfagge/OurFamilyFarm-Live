<x-admin-layout title="My profile">
    <div class="mb-8">
        <p class="mb-2 text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">Your account</p>
        <h1 class="text-3xl font-black tracking-tight text-earth sm:text-4xl">My profile</h1>
        <p class="mt-2 max-w-2xl text-sm leading-6 text-earth-light">Update your name, sign-in email and password.</p>
    </div>

    <div class="grid max-w-5xl gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-6 shadow-sm sm:p-8">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="rounded-2xl border border-earth/10 bg-[#fffdfa] p-6 shadow-sm sm:p-8">
            @include('profile.partials.update-password-form')
        </div>

        <div class="rounded-2xl border border-[#b05f50]/20 bg-[#fffdfa] p-6 shadow-sm sm:p-8 lg:col-span-2">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-admin-layout>
