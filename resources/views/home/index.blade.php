<x-layout title="Marvel Tech's — Solutions IT Modernes | Réseaux, Cloud, Cybersécurité"
    description="Marvel Tech's — Expert IT basé au Cameroun. Maintenance, réseaux, cloud, cybersécurité, développement web. Audit gratuit 15 min. Réponse sous 24h.">

    {{-- ═══════════════════════════════════════ HERO ═══════════════════════════════════════ --}}
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16">
        {{-- Glow orbs --}}
        <div class="hero-glow w-96 h-96 bg-neon-cyan/15 -top-20 -left-20 animate-pulse-slow"></div>
        <div class="hero-glow w-80 h-80 bg-neon-violet/12 top-1/3 -right-20"></div>
        <div class="hero-glow w-64 h-64 bg-neon-emerald/10 bottom-20 left-1/4"></div>

        {{-- Grid background --}}
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(rgba(34,211,238,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,.5) 1px, transparent 1px); background-size: 60px 60px;">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            {{-- Pre-title badge --}}
            <div class="inline-flex items-center gap-2 glass rounded-full px-4 py-2 mb-8 border border-neon-cyan/20">
                <span class="w-2 h-2 rounded-full bg-neon-emerald animate-pulse"></span>
                <span class="text-sm text-neon-cyan font-medium">Disponible · Réponse sous 24h · Audit gratuit 15
                    min</span>
            </div>

            {{-- Headline --}}
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-6 tracking-tight">
                <span class="text-white">Marvel</span>
                <span class="text-gradient-cyan"> Tech's</span>
                <br>
                <span class="text-white text-4xl sm:text-5xl lg:text-6xl font-bold">Solutions IT Modernes</span>
            </h1>

            <p class="text-xl text-slate-400 max-w-3xl mx-auto mb-10 leading-relaxed">
                Réseau · Cloud · Cybersécurité · Développement Web · Maintenance · Support<br>
                <span class="text-slate-300 font-medium">Votre partenaire technologique de confiance.</span>
            </p>

            {{-- CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="{{ route('quote') }}" class="btn-primary text-base px-8 py-3.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Demander un devis
                </a>
                <a href="{{ route('services.index') }}" class="btn-outline text-base px-8 py-3.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Voir nos services
                </a>
            </div>

            {{-- Stats --}}
            @php
            $heroStats = [
            ['120+', 'Projets livrés'],
            ['98%', 'Satisfaction client'],
            ['5+', 'Années d\'expérience'],
            ['24/7', 'Support disponible'],
            ];
            @endphp
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-w-3xl mx-auto">
                @foreach($heroStats as $stat)
                <div class="glass rounded-xl p-4">
                    <div class="text-2xl font-extrabold text-gradient-cyan">{{ $stat[0] }}</div>
                    <div class="text-xs text-slate-400 mt-1">{{ $stat[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-500">
            <span class="text-xs">Découvrez</span>
            <div class="w-5 h-8 border border-slate-600 rounded-full flex items-start justify-center p-1">
                <div class="w-1 h-2 bg-neon-cyan rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════ SERVICES ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-title tag="Nos Services" title="Des solutions IT complètes">
            De la maintenance quotidienne à la transformation digitale, nous couvrons tous vos besoins IT avec expertise
            et réactivité.
        </x-section-title>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <a href="{{ route('services.show', $service->slug) }}"
                class="reveal group glass glass-hover rounded-xl p-6 block">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 text-2xl"
                    style="background: rgba(34,211,238,0.1); border: 1px solid rgba(34,211,238,0.2);">
                    {{ $service->icon }}
                </div>
                <h3 class="text-lg font-bold text-white mb-2 group-hover:text-neon-cyan transition-colors">{{
                    $service->title }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ $service->excerpt }}</p>
                <span class="text-neon-cyan text-sm font-medium flex items-center gap-1">
                    En savoir plus
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </a>
            @endforeach
        </div>
    </section>

    <div class="section-divider mx-4"></div>

    {{-- ═══════════════════════════════════════ PROCESS ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-title tag="Notre Méthode" title="Un process éprouvé, des résultats garantis">
            Chaque intervention suit une méthodologie structurée pour assurer qualité, transparence et efficacité.
        </x-section-title>

        @php
        $steps = [
        ['01', '🔍', 'Audit', 'Analyse complète de votre infrastructure et de vos besoins. Rapport détaillé offert.',
        'badge-cyan'],
        ['02', '📋', 'Proposition', 'Plan d\'action clair avec devis transparent. Délais respectés, zéro mauvaise
        surprise.', 'badge-violet'],
        ['03', '⚙️', 'Implémentation', 'Déploiement professionnel avec suivi en temps réel. Tests rigoureux avant
        livraison.', 'badge-emerald'],
        ['04', '🛡️', 'Support', 'Accompagnement continu, maintenance préventive et support réactif 24/7.',
        'badge-amber'],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($steps as $step)
            <div class="reveal glass rounded-xl p-6 relative">
                <div class="absolute top-4 right-4 text-slate-700 font-black text-4xl select-none">{{ $step[0] }}</div>
                <div class="text-3xl mb-4">{{ $step[1] }}</div>
                <h3 class="text-lg font-bold text-white mb-2">{{ $step[2] }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">{{ $step[3] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <div class="section-divider mx-4"></div>

    {{-- ═══════════════════════════════════════ PORTFOLIO ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-title tag="Réalisations" title="Ce que nous avons accompli">
            Des projets concrets, des résultats mesurables. Découvrez quelques-unes de nos réalisations.
        </x-section-title>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @foreach($projects as $project)
            <a href="{{ route('portfolio.show', $project->slug) }}"
                class="reveal group glass glass-hover rounded-xl overflow-hidden block">
                <div
                    class="h-44 bg-gradient-to-br from-neon-cyan/10 via-neon-violet/10 to-neon-emerald/10 flex items-center justify-center">
                    <span class="text-5xl">{{ $project->cover_image ?? '🖥️' }}</span>
                </div>
                <div class="p-5">
                    <div class="flex flex-wrap gap-1.5 mb-3">
                        @foreach($project->tags ?? [] as $tag)
                        <x-badge color="cyan">{{ $tag }}</x-badge>
                        @endforeach
                    </div>
                    <h3 class="text-base font-bold text-white group-hover:text-neon-cyan transition-colors mb-1">{{
                        $project->title }}</h3>
                    <p class="text-slate-400 text-xs">{{ $project->client }} · {{ $project->year }}</p>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('portfolio.index') }}" class="btn-outline">Voir toutes les réalisations</a>
        </div>
    </section>

    <div class="section-divider mx-4"></div>

    {{-- ═══════════════════════════════════════ TESTIMONIALS ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-title tag="Témoignages" title="Ils nous font confiance">
            +120 clients satisfaits nous recommandent. Voici ce qu'ils disent de Marvel Tech's.
        </x-section-title>

        @php
        $testimonials = [
        ['Paul Essomba', 'Directeur IT, Groupe Alatam', '★★★★★', 'Marvel Tech\'s a entièrement revu notre infrastructure
        réseau en 3 semaines. Zéro downtime, équipe ultra-professionnelle. Je recommande sans hésitation.', 'PE'],
        ['Sophie Mvondo', 'CEO, StartupHub Yaoundé', '★★★★★', 'Notre application web est maintenant rapide, sécurisée et
        scalable. L\'équipe a su comprendre nos besoins et livrer exactement ce qu\'on attendait.', 'SM'],
        ['Jean-Baptiste Nkuimi', 'RSI, Cabinet MedPlus', '★★★★★', 'Audit de sécurité complet, rapport détaillé et plan
        de remédiation clair. Marvel Tech\'s a détecté 3 failles critiques qu\'on ignorait. Excellent travail !', 'JN'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $t)
            <div class="reveal glass rounded-xl p-6">
                <div class="text-neon-amber text-lg mb-3">{{ $t[2] }}</div>
                <p class="text-slate-300 text-sm leading-relaxed mb-5 italic">"{{ $t[3] }}"</p>
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-neon-cyan to-neon-violet flex items-center justify-center text-dark-900 font-bold text-sm">
                        {{ $t[4] }}
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-white">{{ $t[0] }}</div>
                        <div class="text-xs text-slate-400">{{ $t[1] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <div class="section-divider mx-4"></div>

    {{-- ═══════════════════════════════════════ PRICING ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <x-section-title tag="Tarifs" title="Des offres transparentes et adaptées">
            Choisissez la formule qui correspond à vos besoins. Pas de frais cachés, pas de mauvaises surprises.
        </x-section-title>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Starter --}}
            <div class="reveal glass rounded-xl p-7 flex flex-col">
                <div class="mb-6">
                    <x-badge color="cyan">Starter</x-badge>
                    <div class="mt-4 flex items-end gap-2">
                        <span class="text-4xl font-extrabold text-white">50 000</span>
                        <span class="text-slate-400 mb-1">FCFA / mois</span>
                    </div>
                    <p class="text-slate-400 text-sm mt-2">Idéal pour les TPE & indépendants</p>
                </div>
                @php
                $starterFeatures = ['Support IT (8h-18h)', '2 interventions/mois', 'Maintenance basique', 'Rapport
                mensuel', 'Email & téléphone'];
                @endphp
                <ul class="space-y-3 mb-8 flex-1">
                    @foreach($starterFeatures as $feature)
                    <li class="flex items-center gap-2 text-sm text-slate-300">
                        <svg class="w-4 h-4 text-neon-emerald shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('quote') }}" class="btn-outline text-center text-sm">Commencer</a>
            </div>

            {{-- Pro (popular) --}}
            <div class="reveal relative border-gradient">
                <div class="glass rounded-xl p-7 flex flex-col h-full">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                        <span class="pricing-popular">⭐ Le plus populaire</span>
                    </div>
                    <div class="mb-6">
                        <x-badge color="violet">Pro</x-badge>
                        <div class="mt-4 flex items-end gap-2">
                            <span class="text-4xl font-extrabold text-white">150 000</span>
                            <span class="text-slate-400 mb-1">FCFA / mois</span>
                        </div>
                        <p class="text-slate-400 text-sm mt-2">Pour les PME en croissance</p>
                    </div>
                    @php
                    $proFeatures = ['Support IT 24/7', 'Interventions illimitées', 'Audit sécurité trimestriel',
                    'Sauvegarde cloud', 'Domaine + hébergement', 'Rapport hebdomadaire', 'SLA garanti 4h'];
                    @endphp
                    <ul class="space-y-3 mb-8 flex-1">
                        @foreach($proFeatures as $feature)
                        <li class="flex items-center gap-2 text-sm text-slate-300">
                            <svg class="w-4 h-4 text-neon-emerald shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('quote') }}" class="btn-primary text-center text-sm">Démarrer maintenant</a>
                </div>
            </div>

            {{-- Enterprise --}}
            <div class="reveal glass rounded-xl p-7 flex flex-col">
                <div class="mb-6">
                    <x-badge color="emerald">Enterprise</x-badge>
                    <div class="mt-4 flex items-end gap-2">
                        <span class="text-4xl font-extrabold text-white">Sur devis</span>
                    </div>
                    <p class="text-slate-400 text-sm mt-2">Pour les grandes structures & projets complexes</p>
                </div>
                @php
                $entFeatures = ['Tout du plan Pro', 'Ingénieur dédié', 'Architecture sur mesure', 'Formation équipe',
                'SLA garanti 1h', 'Contrat personnalisé', 'Accès prioritaire'];
                @endphp
                <ul class="space-y-3 mb-8 flex-1">
                    @foreach($entFeatures as $feature)
                    <li class="flex items-center gap-2 text-sm text-slate-300">
                        <svg class="w-4 h-4 text-neon-emerald shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('contact') }}" class="btn-outline text-center text-sm">Nous contacter</a>
            </div>
        </div>
    </section>

    <div class="section-divider mx-4"></div>

    {{-- ═══════════════════════════════════════ FAQ ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
        <x-section-title tag="FAQ" title="Questions fréquentes">
            Vous avez des questions ? Nous avons les réponses.
        </x-section-title>

        <div x-data="{ open: null }" class="space-y-3">
            @foreach([
            ['Où êtes-vous basés et intervenez-vous à distance ?', 'Marvel Tech\'s est basé à Yaoundé, Cameroun. Nous
            intervenons sur site dans tout le Cameroun, et à distance pour les clients internationaux via accès
            sécurisé.'],
            ['Quel est le délai de réponse pour une urgence IT ?', 'Pour les clients Pro et Enterprise, le SLA est
            garanti : 4h pour Pro, 1h pour Enterprise. Pour les urgences critiques, nous répondons généralement en moins
            de 30 minutes.'],
            ['Proposez-vous des contrats de maintenance longue durée ?', 'Oui, nos plans de maintenance couvrent 1 mois,
            6 mois ou 1 an. Plus la durée est longue, plus vous bénéficiez de remises et de services supplémentaires.'],
            ['L\'audit de cybersécurité est-il vraiment gratuit ?', 'L\'audit initial de 15 minutes est offert sans
            engagement. Il permet d\'évaluer vos risques et besoins. Un rapport complet fait partie des plans
            payants.'],
            ['Travaillez-vous avec des technologies spécifiques ?', 'Nous sommes polyvalents : Linux/Windows Server,
            Cisco/MikroTik, AWS/Azure, Laravel, React, Docker, Kubernetes, et bien d\'autres. Consultez notre page À
            propos pour la liste complète.'],
            ['Comment se déroule un projet de développement web ?', 'Nous suivons une méthode agile : audit des besoins
            → maquette → développement en sprints → tests → livraison → formation. Vous êtes impliqué à chaque étape.'],
            ] as $i => $item)
            @php
            $q = $item[0];
            $a = $item[1];
            @endphp
            <div class="reveal glass rounded-xl overflow-hidden">
                <button @click="open = open === {{ $i }} ? null : {{ $i }}"
                    class="w-full flex items-center justify-between p-5 text-left"
                    :aria-expanded="open === {{ $i }} ? 'true' : 'false'">
                    <span class="font-semibold text-white text-sm sm:text-base">{{ $q }}</span>
                    <svg class="w-5 h-5 text-neon-cyan shrink-0 ml-4 transition-transform duration-300"
                        :class="{ 'rotate-45': open === {{ $i }} }" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
                <div x-show="open === {{ $i }}" x-collapse
                    class="px-5 pb-5 text-slate-400 text-sm leading-relaxed border-t border-slate-700/50 pt-4">
                    {{ $a }}
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ═══════════════════════════════════════ CTA FINAL ═══════════════════════════════════════ --}}
    <section class="py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <div class="relative border-gradient rounded-2xl">
                <div class="glass rounded-2xl px-8 py-16">
                    <div
                        class="hero-glow w-64 h-64 bg-neon-cyan/15 -top-10 left-1/4 rounded-full blur-3xl absolute pointer-events-none">
                    </div>
                    <div class="relative z-10">
                        <x-badge color="emerald" class="mb-6">🚀 Prêt à démarrer ?</x-badge>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 mt-4">
                            Transformons votre IT ensemble
                        </h2>
                        <p class="text-slate-400 text-lg mb-8 max-w-xl mx-auto">
                            Un audit gratuit de 15 minutes pour identifier vos enjeux. Sans engagement, sans jargon
                            inutile.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('quote') }}" class="btn-primary text-base px-8 py-3.5">
                                Demander mon devis gratuit
                            </a>
                            <a href="{{ route('contact') }}" class="btn-outline text-base px-8 py-3.5">
                                Nous contacter directement
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>