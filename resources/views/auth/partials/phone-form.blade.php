<form method="POST" action="{{ route('phone.send') }}" class="space-y-5">
    @csrf
    <input type="hidden" name="auth_mode" value="phone">

    <div>
        <label for="{{ $phoneId ?? 'phone' }}" class="mb-2 block text-sm font-bold text-[var(--heading)]">Numéro de téléphone</label>
        <div class="relative">
            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-[var(--muted)]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.68l1.5 4.49a1 1 0 01-.5 1.21l-2.26 1.13a11 11 0 005.52 5.52l1.13-2.26a1 1 0 011.21-.5l4.49 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2h-1C9.72 21 3 14.28 3 6V5z" />
                </svg>
            </span>
            <input id="{{ $phoneId ?? 'phone' }}" name="phone" type="tel" value="{{ old('phone') }}"
                class="form-input py-3.5 pl-12" placeholder="+237 6XX XXX XXX" required autocomplete="tel">
        </div>
        @error('phone')
            <p class="mt-2 text-sm text-[var(--danger)]">{{ $message }}</p>
        @enderror
        <p class="mt-2 text-xs leading-5 text-[var(--muted)]">Format international. Les numéros camerounais à 9 chiffres sont acceptés.</p>
    </div>

    <fieldset>
        <legend class="mb-2 block text-sm font-bold text-[var(--heading)]">Recevoir le code par</legend>
        <div class="grid grid-cols-2 gap-3">
            <label class="cursor-pointer">
                <input class="peer sr-only" type="radio" name="channel" value="sms" @checked(old('channel', 'sms') === 'sms')>
                <span class="flex items-center justify-center gap-2 rounded-xl border border-[var(--border-soft)] px-3 py-3 text-sm font-semibold text-[var(--muted)] transition peer-checked:border-[#9061ff] peer-checked:bg-[#9061ff]/10 peer-checked:text-[var(--primary)]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.42-4.03 8-9 8a10 10 0 01-4.26-.94L3 20l1.22-3.26A7.32 7.32 0 013 12c0-4.42 4.03-8 9-8s9 3.58 9 8z" />
                    </svg>
                    SMS
                </span>
            </label>
            <label class="cursor-pointer">
                <input class="peer sr-only" type="radio" name="channel" value="whatsapp" @checked(old('channel') === 'whatsapp')>
                <span class="flex items-center justify-center gap-2 rounded-xl border border-[var(--border-soft)] px-3 py-3 text-sm font-semibold text-[var(--muted)] transition peer-checked:border-[#25D366] peer-checked:bg-[#25D366]/10 peer-checked:text-[#18a84e]">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.04 2a9.84 9.84 0 00-8.47 14.82L2 22l5.3-1.52A9.97 9.97 0 1012.04 2zm0 17.95a8.12 8.12 0 01-4.14-1.13l-.3-.18-3.15.9.92-3.06-.2-.32a8 8 0 116.87 3.79zm4.45-6.04c-.24-.12-1.44-.71-1.66-.79-.22-.08-.38-.12-.54.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-.24-.12-1.03-.38-1.95-1.21a7.3 7.3 0 01-1.35-1.68c-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.31-.74-1.79-.2-.47-.4-.41-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.69 2.58 4.1 3.62.57.25 1.02.39 1.37.5.57.18 1.09.16 1.5.1.46-.07 1.44-.59 1.64-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28z"/>
                    </svg>
                    WhatsApp
                </span>
            </label>
        </div>
    </fieldset>

    <button type="submit" class="btn-primary w-full justify-center py-3.5">
        Recevoir mon code
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
    </button>
</form>
