<x-layout title="Demande de Devis | Marvel Tech's"
    description="Demandez un devis IT personnalisé à Marvel Tech's. Remplissez le formulaire et recevez une proposition sous 24h.">
    <div class="pt-28 pb-24">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <x-badge color="violet" class="mb-4">Devis Gratuit</x-badge>
                <h1 class="text-4xl font-extrabold text-white mb-4 mt-4">Demander un devis</h1>
                <p class="text-slate-400">Remplissez le formulaire ci-dessous. Nous vous contactons sous 24h avec une
                    proposition personnalisée.</p>
            </div>

            @if(session('success'))
            <x-alert type="success" :dismissible="true" class="mb-6">{{ session('success') }}</x-alert>
            @endif

            <form action="{{ route('quote.store') }}" method="POST" class="glass rounded-xl p-8 space-y-5">
                @csrf
                {{-- Honeypot --}}
                <div class="hidden" aria-hidden="true"><input type="text" name="website" tabindex="-1"
                        autocomplete="off"></div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <x-input name="name" label="Nom complet" placeholder="Jean Dupont" :required="true" />
                    <x-input name="email" type="email" label="Email professionnel" placeholder="jean@entreprise.com"
                        :required="true" />
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <x-input name="phone" type="tel" label="Téléphone" placeholder="+237 6XX XXX XXX"
                        :required="true" />
                    <x-input name="company" label="Entreprise / Organisation" placeholder="Ma Société (optionnel)" />
                </div>

                <div>
                    <label for="service" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Service recherché <span class="text-neon-rose">*</span>
                    </label>
                    <select name="service" id="service" required class="form-input">
                        <option value="">— Choisir —</option>
                        @foreach([
                        'Maintenance & Support IT',
                        'Réseaux & Administration Systèmes',
                        'Développement Web & Mobile',
                        'Cloud & DevOps',
                        'Cybersécurité & Audit',
                        'Installation & Déploiement',
                        'Sauvegarde & Continuité d\'activité',
                        'Pack complet',
                        'Autre',
                        ] as $s)
                        <option value="{{ $s }}" {{ old('service', request('service'))===$s ? 'selected' : '' }}>{{ $s
                            }}</option>
                        @endforeach
                    </select>
                    @error('service')<p class="text-neon-rose text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label for="budget" class="block text-sm font-medium text-slate-300 mb-1.5">Budget estimé <span
                                class="text-neon-rose">*</span></label>
                        <select name="budget" id="budget" required class="form-input">
                            <option value="">— Budget —</option>
                            @foreach(['< 100 000 FCFA', '100 000 – 500 000 FCFA' , '500 000 – 2 000 000 FCFA'
                                , '2 000 000+ FCFA' , 'Non défini' ] as $b) <option value="{{ $b }}" {{
                                old('budget')===$b ? 'selected' : '' }}>{{ $b }}</option>
                                @endforeach
                        </select>
                        @error('budget')<p class="text-neon-rose text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <x-input name="deadline" type="date" label="Délai souhaité (optionnel)" />
                </div>

                <x-textarea name="details" label="Détails du projet"
                    placeholder="Décrivez votre projet en détail : contexte, besoins, contraintes techniques, volume d'utilisateurs, environnement actuel..."
                    :required="true" :rows="6" />

                <div class="flex items-start gap-3 text-sm text-slate-400">
                    <svg class="w-5 h-5 text-neon-emerald shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Vos données sont confidentielles et ne sont jamais partagées avec des tiers.</span>
                </div>

                <x-button type="submit" variant="primary" class="w-full justify-center py-3.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Envoyer ma demande de devis
                </x-button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-slate-500 text-sm">Vous préférez un échange direct ? <a href="{{ route('contact') }}"
                        class="text-neon-cyan hover:underline">Envoyez-nous un message</a></p>
            </div>
        </div>
    </div>
</x-layout>