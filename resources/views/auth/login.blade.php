<x-guest-layout>
    <div class="mb-8">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-leaf-dark">Welcome back</p>
        <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-earth">Sign in to your workspace</h2>
        <p class="mt-2 text-sm leading-6 text-earth-light">Keep your public farm story fresh and useful.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-earth/25 text-leaf shadow-sm focus:ring-leaf" name="remember">
                <span class="ms-2 text-sm text-earth-light">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6 flex flex-col-reverse items-stretch gap-4 sm:flex-row sm:items-center sm:justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-earth-light underline decoration-leaf decoration-2 underline-offset-4 transition hover:text-leaf-dark focus:outline-none focus:ring-2 focus:ring-leaf" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="justify-center rounded-xl bg-leaf px-6 py-3 font-bold text-white shadow-sm transition hover:bg-leaf-dark focus:bg-leaf-dark focus:ring-leaf active:bg-leaf-dark">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
