<form wire:submit.prevent="submitForm" class="space-y-5">
    @if ($successMessage)
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">{{ $successMessage }}</div>
    @endif

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-earth">Name</label>
            <input id="name" type="text" wire:model="name" class="w-full rounded-xl border border-earth/20 bg-cream px-4 py-3 text-earth outline-none transition focus:border-leaf focus:ring-2 focus:ring-leaf/30" placeholder="Your full name" />
            @error('name') <span class="mt-2 block text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email" class="mb-2 block text-sm font-semibold text-earth">Email</label>
            <input id="email" type="email" wire:model="email" class="w-full rounded-xl border border-earth/20 bg-cream px-4 py-3 text-earth outline-none transition focus:border-leaf focus:ring-2 focus:ring-leaf/30" placeholder="you@example.com" />
            @error('email') <span class="mt-2 block text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label for="phone" class="mb-2 block text-sm font-semibold text-earth">Phone</label>
            <input id="phone" type="tel" wire:model="phone" class="w-full rounded-xl border border-earth/20 bg-cream px-4 py-3 text-earth outline-none transition focus:border-leaf focus:ring-2 focus:ring-leaf/30" placeholder="+234 800 000 0000" />
            @error('phone') <span class="mt-2 block text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="service" class="mb-2 block text-sm font-semibold text-earth">Service</label>
            <select id="service" wire:model="service" class="w-full rounded-xl border border-earth/20 bg-cream px-4 py-3 text-earth outline-none transition focus:border-leaf focus:ring-2 focus:ring-leaf/30">
                <option value="">Select a service</option>
                <option>Crop Production</option>
                <option>Soil Analysis</option>
                <option>Seed Multiplication</option>
                <option>Water Analysis</option>
                <option>Farm Management</option>
                <option>Farm Design</option>
                <option>Capacity Building</option>
                <option>Resources Verification</option>
            </select>
            @error('service') <span class="mt-2 block text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>

    <div>
        <label for="message" class="mb-2 block text-sm font-semibold text-earth">Message</label>
        <textarea id="message" wire:model="message" rows="5" class="w-full rounded-xl border border-earth/20 bg-cream px-4 py-3 text-earth outline-none transition focus:border-leaf focus:ring-2 focus:ring-leaf/30" placeholder="Tell us about your agricultural project or enquiry."></textarea>
        @error('message') <span class="mt-2 block text-sm text-red-600">{{ $message }}</span> @enderror
    </div>

    <div class="hidden">
        <input type="text" wire:model="website" aria-label="Website" tabindex="-1" autocomplete="off">
    </div>

    <button type="submit" class="inline-flex w-full items-center justify-center rounded-full bg-leaf px-6 py-3.5 text-base font-semibold text-white shadow-sm transition hover:bg-leaf-dark" wire:loading.attr="disabled">
        <span wire:loading.remove>Send Enquiry</span>
        <span wire:loading>Sending…</span>
    </button>
</form>
