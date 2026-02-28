<x-layout title="Contact | Marvel Tech's — Parlons de votre projet"
    description="Contactez Marvel Tech's pour toute demande IT : support, devis, partenariat. Réponse garantie sous 24h.">
    <div class="pt-28 pb-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <x-badge color="cyan" class="mb-4">Contact</x-badge>
                <h1 class="text-4xl font-extrabold text-white mb-4 mt-4">Parlons de votre projet</h1>
                <p class="text-[var(--muted)] text-lg">Audit gratuit de 15 min · Réponse sous 24h · Sans engagement</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Form --}}
                <div class="md:col-span-2">
                    @if(session('success'))
                    <x-alert type="success" :dismissible="true" class="mb-6">
                        {{ session('success') }}
                    </x-alert>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="glass rounded-xl p-8 space-y-5">
                        @csrf
                        {{-- Honeypot anti-spam --}}
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <x-input name="name" label="Nom complet" placeholder="Ex: Jean Dupont" :required="true" />
                            <x-input name="email" type="email" label="Email" placeholder="vous@entreprise.com"
                                :required="true" />
                        </div>

                        <x-input name="phone" type="tel" label="Téléphone (optionnel)" placeholder="+237 6XX XXX XXX" />

                        <div>
                            <label for="service" class="block text-sm font-medium text-[var(--muted)] mb-1.5">
                                Service concerné <span class="text-neon-rose">*</span>
                            </label>
                            <select name="service" id="service" required class="form-input">
                                <option value="">— Choisir un service —</option>
                                @foreach([
                                'Maintenance & Support IT',
                                'Réseaux & Administration Systèmes',
                                'Développement Web & Mobile',
                                'Cloud & DevOps',
                                'Cybersécurité & Audit',
                                'Installation & Déploiement',
                                'Sauvegarde & Continuité d\'activité',
                                'Autre',
                                ] as $s)
                                <option value="{{ $s }}" {{ old('service')===$s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                            @error('service')<p class="text-neon-rose text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="budget" class="block text-sm font-medium text-[var(--muted)] mb-1.5">Budget
                                estimé</label>
                            <select name="budget" id="budget" class="form-input">
                                <option value="">— Sélectionner —</option>
                                @foreach(['< 100 000 FCFA', '100 000 – 500 000 FCFA' , '500 000 – 2 000 000 FCFA'
                                    , '2 000 000+ FCFA' , 'Non défini' ] as $b) <option value="{{ $b }}" {{
                                    old('budget')===$b ? 'selected' : '' }}>{{ $b }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <x-textarea name="message" label="Message" placeholder="Décrivez votre besoin ou problème IT..."
                            :required="true" :rows="5" />

                        <x-button type="submit" variant="primary" class="w-full justify-center py-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Envoyer le message
                        </x-button>
                    </form>
                </div>

                {{-- Contact info --}}
                <div class="space-y-5">
                    @foreach([
                    ['📍', 'Adresse', 'Yaoundé, Cameroun', 'Bassin du Mfoundi'],
                    ['✉️', 'Email', 'contact@marveltechs.cm', 'Réponse sous 24h'],
                    ['📞', 'Téléphone', '+237 6XX XXX XXX', 'Lun–Sam, 8h–20h'],
                    ['⚡', 'Urgences', '+237 6XX XXX XXX', '24h/7j pour clients Pro'],
                    ] as [$icon, $label, $value, $note])
                    <div class="glass rounded-xl p-4 flex items-start gap-3">
                        <span class="text-2xl">{{ $icon }}</span>
                        <div>
                            <div class="text-xs text-[var(--muted)] opacity-60 uppercase tracking-wider">{{ $label }}
                            </div>
                            <div class="text-white font-medium text-sm">{{ $value }}</div>
                            <div class="text-[var(--muted)] text-xs">{{ $note }}</div>
                        </div>
                    </div>
                    @endforeach

                    <div class="glass rounded-xl p-5 border border-neon-emerald/15">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-2 h-2 rounded-full bg-neon-emerald animate-pulse"></span>
                            <span class="text-neon-emerald text-sm font-semibold">Disponible maintenant</span>
                        </div>
                        <p class="text-[var(--muted)] text-xs">Notre équipe est disponible pour répondre à vos
                            questions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>