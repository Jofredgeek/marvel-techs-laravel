<x-guest-layout>
    <x-slot name="title">Connexion</x-slot>

    <div x-data="{ mode: @js($errors->has('phone') || old('auth_mode') === 'phone' ? 'phone' : 'email') }">
        <div class="text-center">
            <span class="text-xs font-extrabold uppercase tracking-[.18em] text-[var(--primary)]">Heureux de vous revoir</span>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-[var(--heading)]">Connectez-vous</h1>
            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Accédez à votre espace Marvel Tech's en quelques secondes.</p>
        </div>

        <x-auth-session-status class="mt-5 rounded-xl border border-[var(--success)]/25 bg-[var(--success)]/10 p-3 text-center" :status="session('status')" />

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

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="auth_mode" value="email">

                <div>
                    <label for="email" class="mb-2 block text-sm font-bold text-[var(--heading)]">Adresse e-mail</label>
                    <input id="email" class="form-input py-3.5" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username" placeholder="vous@exemple.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <div class="mb-2 flex items-center justify-between gap-3">
                        <label for="password" class="block text-sm font-bold text-[var(--heading)]">Mot de passe</label>
                        <a class="text-xs font-semibold text-[var(--primary)] hover:underline" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    </div>
                    <input id="password" class="form-input py-3.5" type="password" name="password" required
                        autocomplete="current-password" placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <label class="flex cursor-pointer items-center gap-3 text-sm text-[var(--muted)]">
                    <input type="checkbox" class="rounded border-[var(--border)] text-[var(--primary)] focus:ring-[var(--primary)]" name="remember">
                    Rester connecté sur cet appareil
                </label>

                <button type="submit" class="btn-primary w-full justify-center py-3.5">
                    Se connecter
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>
        </div>

        <div x-cloak x-show="mode === 'phone'" class="mt-6">
            @include('auth.partials.phone-form', ['phoneId' => 'login_phone'])
        </div>

        <p class="mt-7 text-center text-sm text-[var(--muted)]">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="font-bold text-[var(--primary)] hover:underline">Créer un compte</a>
        </p>
    </div>
</x-guest-layout>
