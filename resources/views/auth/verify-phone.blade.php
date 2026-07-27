<x-guest-layout>
    <x-slot name="title">Vérifier le téléphone</x-slot>

    <div class="text-center">
        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#9061ff]/20 to-[#06b6d4]/15 text-[var(--primary)]">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-3.5A11.9 11.9 0 0112 3a11.9 11.9 0 01-8 3.5c0 5.25 3.44 10.13 8 11.5 4.56-1.37 8-6.25 8-11.5z" />
            </svg>
        </span>
        <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-[var(--heading)]">Vérifiez votre numéro</h1>
        <p class="mt-2 text-sm leading-6 text-[var(--muted)]">
            Code envoyé par {{ $channel === 'whatsapp' ? 'WhatsApp' : 'SMS' }} au
            <strong class="text-[var(--heading)]">{{ $phone }}</strong>
        </p>
    </div>

    <x-auth-session-status class="mt-5 rounded-xl border border-[var(--success)]/25 bg-[var(--success)]/10 p-3 text-center" :status="session('status')" />

    @if ($previewCode)
        <div class="mt-5 rounded-xl border border-[#06b6d4]/30 bg-[#06b6d4]/10 p-4 text-center">
            <p class="text-xs font-bold uppercase tracking-[.15em] text-[#0796ac]">Mode local — code de test</p>
            <p class="mt-1 font-mono text-2xl font-extrabold tracking-[.3em] text-[var(--heading)]">{{ $previewCode }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('phone.check') }}" class="mt-6 space-y-5">
        @csrf
        <div>
            <label for="code" class="mb-2 block text-center text-sm font-bold text-[var(--heading)]">Code à 6 chiffres</label>
            <input id="code" name="code" inputmode="numeric" pattern="[0-9]{6}" maxlength="6"
                class="form-input py-4 text-center font-mono text-2xl font-extrabold tracking-[.45em]"
                placeholder="000000" required autofocus autocomplete="one-time-code">
            <x-input-error :messages="$errors->get('code')" class="mt-2 text-center" />
        </div>

        <div>
            <label for="name" class="mb-2 block text-sm font-bold text-[var(--heading)]">
                Nom complet
                <span class="font-normal text-[var(--muted)]">(si c’est votre première connexion)</span>
            </label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-input py-3.5"
                placeholder="Votre nom" autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <button type="submit" class="btn-primary w-full justify-center py-3.5">Vérifier et continuer</button>
    </form>

    <div class="mt-5 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-sm">
        <form method="POST" action="{{ route('phone.send') }}">
            @csrf
            <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="hidden" name="channel" value="{{ $channel }}">
            <button class="font-bold text-[var(--primary)] hover:underline" type="submit">Renvoyer le code</button>
        </form>
        <a href="{{ route('login') }}" class="font-semibold text-[var(--muted)] hover:text-[var(--heading)]">Changer de numéro</a>
    </div>
</x-guest-layout>
