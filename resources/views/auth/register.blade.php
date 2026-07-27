<x-guest-layout>
    <x-slot name="title">Créer un compte</x-slot>

    <div x-data="{ mode: @js($errors->has('phone') || old('auth_mode') === 'phone' ? 'phone' : 'email') }">
        <div class="text-center">
            <span class="text-xs font-extrabold uppercase tracking-[.18em] text-[var(--primary)]">Bienvenue</span>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-[var(--heading)]">Créez votre compte</h1>
            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Choisissez la méthode qui vous convient le mieux.</p>
        </div>

        <div class="mt-7 rounded-xl bg-[var(--surface-2)] p-1">
            <div class="grid grid-cols-2 gap-1">
                <button type="button" @click="mode = 'email'"
                    :class="mode === 'email' ? 'bg-[var(--surface)] text-[var(--heading)] shadow-sm' : 'text-[var(--muted)] hover:text-[var(--text)]'"
                    class="rounded-lg px-3 py-2.5 text-sm font-bold transition">E-mail</button>
                <button type="button" @click="mode = 'phone'"
                    :class="mode === 'phone' ? 'bg-[var(--surface)] text-[var(--heading)] shadow-sm' : 'text-[var(--muted)] hover:text-[var(--text)]'"
                    class="rounded-lg px-3 py-2.5 text-sm font-bold transition">Téléphone</button>
            </div>
        </div>

        <div x-show="mode === 'email'" class="mt-6">
            @include('auth.partials.google-button')
            @include('auth.partials.divider')

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="auth_mode" value="email">

                <div>
                    <label for="name" class="mb-2 block text-sm font-bold text-[var(--heading)]">Nom complet</label>
                    <input id="name" class="form-input py-3.5" type="text" name="name" value="{{ old('name') }}"
                        required autofocus autocomplete="name" placeholder="Votre nom">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-bold text-[var(--heading)]">Adresse e-mail</label>
                    <input id="email" class="form-input py-3.5" type="email" name="email" value="{{ old('email') }}"
                        required autocomplete="username" placeholder="vous@exemple.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="password" class="mb-2 block text-sm font-bold text-[var(--heading)]">Mot de passe</label>
                        <input id="password" class="form-input py-3.5" type="password" name="password" required
                            autocomplete="new-password" placeholder="8 caractères min.">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password_confirmation" class="mb-2 block text-sm font-bold text-[var(--heading)]">Confirmation</label>
                        <input id="password_confirmation" class="form-input py-3.5" type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="Répétez">
                    </div>
                </div>

                <button type="submit" class="btn-primary w-full justify-center py-3.5">
                    Créer mon compte
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>
        </div>

        <div x-cloak x-show="mode === 'phone'" class="mt-6">
            @include('auth.partials.phone-form', ['phoneId' => 'register_phone'])
        </div>

        <p class="mt-7 text-center text-sm text-[var(--muted)]">
            Vous avez déjà un compte ?
            <a href="{{ route('login') }}" class="font-bold text-[var(--primary)] hover:underline">Se connecter</a>
        </p>
    </div>
</x-guest-layout>
